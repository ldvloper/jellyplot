<?php

namespace App\Http\Livewire\Team\Chat;

use App\Models\ModelDecrypter;
use App\Models\TeamMessage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Mobile_Detect;

class General extends Component
{

    public string $messageText = '';

    protected function rules(){
        return[
            'messageText' => 'required|max:1000',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    /**
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {

        $detect = new Mobile_Detect;

        $messages = TeamMessage::with('user')
            ->where('team_id', '=', auth()->user()->currentTeam->id)
            ->latest()
            ->take(10)
            ->get()
            ->sortBy('id');

        foreach ($messages as $message) {
            try {
                $message['message_text'] = Crypt::decryptString($message['message_text']);
            }catch (DecryptException $e) {
                //Pass the Decryption error
                $message['message_text'] = -1;
            }
        }
        return view('livewire.team.chat.general', compact('messages'));
    }

    public function deleteMessage($id)
    {
        $message = TeamMessage::where('id', $id)->first();
        $deletedMessage = $message;
        if(auth()->user()->id === $message->user_id)
        {
            $message->delete();
            session()->flash('deleteNotification',
                'The message '.$deletedMessage->id.' have been deleted');
        }
    }

    public function sendMessage()
    {
        //Project Basic Information
        $validatedData = $this->validate();

        TeamMessage::create([
            'user_id' => auth()->user()->id,
            'team_id' => auth()->user()->currentTeam->id,
            'message_text' => Crypt::encryptString($validatedData['messageText'])
        ]);

        $this->reset('messageText');
    }
}

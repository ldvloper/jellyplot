
<div wire:poll.visible
    x-data="{
    show:false}"
    x-on:keydown.window.prevent.slash="$refs.inputMessage.focus();focusOnBottom()"
    x-on:keydown.window.prevent.enter="$refs.formSubmit.click();focusOnBottom()"
class="h-full">
    <div class="flex sm:items-center px-3 md:px-12 py-3 border-b-2 border-gray-200">
        <div class="w-full grid grid-cols-2 gap-4 items-center justify-items-start">
            <div class="flex items-center leading-tight">
                <img class="inline-block h-10 w-10 rounded-full ring-2 ring-white mr-2" src="{{auth()->user()->profile_photo_url}}">
                <div class="text-lg mt-1 flex items-center justify-end">
                    <div>
                        <p class="text-lg text-gray-600 mr-2">{{auth()->user()->name}}</p>
                        <p class="text-sm text-gray-600 mr-2">{{auth()->user()->email}}</p>
                    </div>
                    <span class="relative inline-flex rounded-md shadow-sm">
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-green-600"></span>
                    </span>
                </div>
            </div>
            <div x-on:click="showButton = false" class="text-2xl mt-1 justify-self-end cursor-pointer">
                <span class="text-gray-400">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                   </svg>
                </span>
            </div>
        </div>
    </div>

    <div id="messages" class="h-96 flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
        @forelse($messages as $index => $message)
            @if($index > 0 && !($message->created_at->isSameDay($messages[$index - 1]->created_at)))
                @if($message->created_at->diffInDays(Carbon\Carbon::now()) < 7)
                    <div class="text-gray-600 w-full text-center p-2 rounded-md font-light text-regular capitalize">
                        {{$message->created_at->format('l')}}
                    </div>
                @else
                    <span class="font-light text-xs">{{$message->created_at->format('d M Y')}}</span>
                @endif
            @elseif($message->id == $messages->first()->id)
                @if($message->created_at->diffInDays(Carbon\Carbon::now()) < 7)
                    <div class="text-gray-600 w-full text-center p-2 rounded-md font-light text-regular capitalize">
                        {{$message->created_at->format('l')}}
                    </div>
                @else
                    <span class="font-light text-xs">{{$message->created_at->format('d M Y')}}</span>
                @endif
            @endif
            @if($message->user->id == auth()->user()->id)
                <div class="chat-message-user w-full py-2">
                    <div class="flex justify-end overflow-auto">
                        <div class="flex flex-col space-y-2 text-xs order-1 items-end overflow-auto">
                            <div class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-primary-color text-white text-right">
                                <p class="font-light block pb-1">
                                    <span class="font-bold">You</span> at {{$message->created_at->format('H:i')}}
                                </p>
                                @if($message->message_text !== -1)
                                    <span class=" break-all text-sm">{{$message->message_text}}</span>
                                @else
                                    <span id="{{$message->id}}" class="break-all text-red-200 text-sm">{{_('Error with your message encryption')}}</span>
                                @endif
                            </div>
                        </div>
                        <a wire:click="deleteMessage({{$message->id}})" class="w-6 h-6 rounded-full order-2 text-gray-400 hover:text-primary-color cursor-pointer" title="{{__('Delete Message')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </a>
                    </div>
                </div>
            @else
                <div class="chat-message">
                    <div class="flex items-start">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                            <div class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">
                                <p class="font-light block pb-1">
                                    <span class="font-bold">{{$message->user->name}}</span> at {{$message->created_at->format('H:i')}}
                                </p>
                                @if($message->message_text !== -1)
                                    <span class=" break-all text-sm">{{$message->message_text}}</span>
                                @else
                                    <span id="{{$message->id}}" class="break-all text-red-800 text-sm">{{_('Error with message encryption')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="h-full grid grid-cols-1 gap-1 justify-items-center content-center font-semibold text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <p class="text-justify">
                    No messages
                </p>
            </div>
        @endforelse
    </div>

    <div class="self-end">
        <div class="border-t-2 border-gray-200 px-4 py-3 mb-2 sm:mb-0">
            <form wire:submit.prevent="sendMessage">
                <div class="relative flex justify-center items-end">
                    <textarea x-ref="inputMessage"
                              wire:model.defer="messageText" type="text" placeholder="Your message here (Press /)"  class="w-full text-sm resize-none bg-gray-100 focus:outline-none focus:border-transparent focus:ring-primary-color focus:placeholder-gray-400 text-gray-600  no-scrollbar rounded-md py-3">
                    </textarea>
                    <div class="ml-1 md:ml-3 ">
                        <button x-ref="formSubmit" type="submit" class="h-12 p-5 text-xs md:text-sm inline-flex items-center justify-center rounded-md transition duration-500 ease-in-out text-white bg-primary-color hover:bg-secondary-color focus:outline-none">
                           {{__('Submit')}}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


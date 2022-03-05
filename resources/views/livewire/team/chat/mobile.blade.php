<div wire:poll
      x-data="{
    show:false}"
      x-on:keydown.window.prevent.meta="$refs.inputMessage.focus();"
      x-on:keydown.window.prevent.enter="$refs.formSubmit.click();">

<div class="fixed w-full bg-primary-color h-16 pt-2 text-white flex justify-between shadow-md"
    style="top:0px; overscroll-behavior: none;">
    <!-- back button -->
    <a href="{{route('dashboard')}}" class="my-3 ml-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>

    </a>
    <div class="my-2 text-green-100 font-bold text-lg tracking-wide">
        {{auth()->user()->currentTeam->name}}
        <span class="flex text-xs text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            {{__('End to End Encryption')}}
        </span>
    </div>
    <!-- 3 dots -->
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        class="icon-dots-vertical w-8 h-8 mt-2 mr-2"
    >
        <path
            class="text-green-100 fill-current"
            fill-rule="evenodd"
            d="M12 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
        />
    </svg>
</div>

<!-- MESSAGES -->
<div class="mt-20 mb-16 p-2">
    @forelse($messages as $message)
        @if($message->user->id == auth()->user()->id)
            <!-- SINGLE MESSAGE -->
            <div class="clearfix pt-2">
                <div class="chat-message-user">
                    <div class="flex items-end justify-end overflow-auto">
                        <div class="flex flex-col space-y-2 text-xs order-1 items-end overflow-auto">
                            <div class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-primary-color text-white text-right">
                                <p class="font-bold block pb-1">
                                    {{auth()->user()->name}}
                                    <br>
                                    <span class="font-light text-xs">[{{$message->created_at->format('d M Y H:i')}}]</span>
                                </p>
                                @if($message->message_text !== -1)
                                    <span class=" break-all text-sm">{{$message->message_text}}</span>
                                @else
                                    <span id="{{$message->id}}" class="break-all text-red-200 text-sm">{{_('Error with your message encryption')}}</span>
                                @endif
                            </div>
                        </div>
                        <span class="w-6 h-6 rounded-full order-2 text-gray-400 hover:text-primary-color cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        @else
            <!-- SINGLE MESSAGE-->
            <div class="clearfix pt-2">
                <div class="chat-message">
                    <div class="flex items-end">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                            <div class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">
                                <p class="font-bold block pb-1">
                                    {{$message->user->name}}
                                    <br>
                                    <span class="font-light text-xs">[{{$message->created_at->format('d M Y H:i')}}]</span>
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
            </div>
        @endif
    @empty
        <span class="text-xl font-bold">No messages yet</span>
    @endforelse

</div>

<!-- MESSAGE INPUT AREA -->
    <form wire:submit.prevent="sendMessage">
        <div class="fixed w-full flex items-center justify-center bg-white border-t-2 border-gray-200" style="bottom: 0px;">
        <textarea
              wire:model.defer="messageText"
              x-ref="inputMessage"
              rows="1" type="text"
              placeholder="Enter your message"
              wire:model.defer="messageText"
              class="flex-grow m-2 py-2 px-4 mr-1 rounded-full border border-gray-300 bg-gray-200 resize-none focus:outline-none focus:border-transparent focus:ring-primary-color focus:placeholder-gray-400 text-gray-600 pr-16 no-scrollbar"
              rows="1"
              style="outline: none;"
          ></textarea>
        <button x-ref="formSubmit" type="submit" class="inline-flex items-center justify-center rounded-full h-10 w-10 md:h-12 md:w-12  ease-in-out text-white bg-primary-color hover:bg-secondary-color focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 transform rotate-90">
                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
            </svg>
        </button>
        </div>
    </form>
</div>

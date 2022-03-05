<div>
<div class="p-3 rounded-t-md bg-primary-color">
    <h1 class="text-white font-bold text-md">{{__('Comments')}}</h1>
</div>
<div class="h-96 bg-gray-50 relative antialiased mx-auto overflow-auto">
    @forelse($comments as $comment)
        <div class="bg-white rounded-t-md space-y-4 p-2 xl:p-10">
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{$comment->user->profile_photo_url}}" alt="{{$comment->user->name}}'s Profile Photo">
                </div>
                <div x-cloak x-data="{showReplies :false}" class="flex-1 border rounded-md px-1 py-2 sm:px-6 sm:py-4 leading-relaxed">
                    <strong>{{$comment->user->name}}</strong>
                    <span class="ml-2 text-xs text-gray-400">
                    {{$comment->created_at->format('D d M Y')}}
                    </span>
                    <p class="text-sm">
                        {{$comment->comment}}
                    </p>
                    <a x-on:click="showReplies = !showReplies" class="w-48 mt-4 flex items-center cursor-pointer" title="{{__('Show Comments')}}">
                        @if($comment->replies->count())
                            <div class="flex -space-x-2 mr-2">
                                @foreach($comment->replies->slice(0, 5) as $reply)
                                    <img class="rounded-full w-6 h-6 border border-white" src="{{$reply->user->profile_photo_url}}" alt="{{$reply->user->name}}'s Profile Photo">
                                @endforeach
                            </div>
                        @endif

                        <div class="text-sm text-gray-500 hover:text-primary-color font-semibold">
                            @if($comment->replies->count() == 1)
                                Show {{$comment->replies->count()}} Reply
                            @else
                                Show {{$comment->replies->count()}} Replies
                            @endif
                        </div>
                    </a>
                    <div x-show="showReplies" class="mt-5 mx-auto ">
                        @if($comment->replies)
                            <a x-on:click="showReplies = false"  class="uppercase tracking-wide text-gray-400 hover:text-primary-color font-bold text-xs cursor-pointer">Hide Replies</a>
                        @endif
                        @livewire('tasks.comments.reply.get-replies', ['comment' => $comment])
                    </div>
                </div>
                @if($comment->user_id == auth()->user()->id)
                    <div x-cloak x-data="{showActions: false}" class="text-gray-400" x-on:click.away="showActions = false">
                        <button type="button" x-on:click="showActions = !showActions" class="hover:text-primary-color cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                            </svg>
                        </button>
                        <div x-show="showActions" class="absolute right-6 -mt-4">
                            <ul>
                                <li wire:click="deleteComment({{$comment->id}})" class="px-4 py-2 flex items-center bg-primary-color rounded-md text-white hover:bg-secondary-color cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                                    </svg>

                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @empty
        <div class="h-96 w-full bg-white flex justify-center items-center">
            <h1>{{__('No Comments')}}</h1>
        </div>
    @endforelse
</div>
</div>

<div class="antialiased mx-auto">
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

                    <div class="flex -space-x-2 mr-2">
                        @foreach($comment->replies as $reply)
                        <img class="rounded-full w-6 h-6 border border-white" src="{{$reply->user->profile_photo_url}}" alt="{{$reply->user->name}}'s Profile Photo">
                        @endforeach
                    </div>

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
                    <x-tasks.replies :comment="$comment"></x-tasks.replies>
                </div>
            </div>
        </div>
    </div>
    @empty
        <div class="h-24 w-full flex justify-center items-center">
            <h1>No Comments</h1>
        </div>
    @endforelse

    @if($comments->links('vendor.livewire.pagination.tailwind'))
        {{ $comments->links('vendor.livewire.pagination.tailwind') }}
    @endif
</div>

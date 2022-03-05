<div>
    <div class="space-y-4">
        @foreach($replies as $reply)
            <div class="flex">
                <div class="flex-shrink-0 mr-3">
                    <img class="mt-3 rounded-full w-6 h-6 sm:w-8 sm:h-8" src="{{$reply->user->profile_photo_url}}" alt="{{$reply->user->name}}'s Profile Photo">
                </div>
                <div class="flex-1 bg-gray-100 rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                    <strong>{{$reply->user->name}}</strong>
                    <span class="ml-2 text-xs text-gray-400">{{$reply->created_at->format('D d M Y')}}</span>
                    <p class="text-xs sm:text-sm">
                        {{$reply->reply}}
                    </p>
                </div>
            </div>
        @endforeach
        <div>
            <livewire:tasks.comments.reply.create-comment-reply :task-comment="$comment"
                                                                :user="auth()->user()">
            </livewire:tasks.comments.reply.create-comment-reply>
        </div>
    </div>
</div>

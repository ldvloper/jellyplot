<li class="flex items-center py-2">
    <img src="{{$user->profile_photo_url}}"
         class="inline object-cover w-6 h-6 rounded-full"/>
    <div class="ml-2">
        <p class="text-md">
            {{$user->name}}
            <span class="text-xs">{{$user->email}}</span>
        </p>
    </div>
</li>

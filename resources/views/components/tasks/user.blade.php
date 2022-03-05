<div class="bg-white shadow-lg overflow-hidden sm:rounded-lg">
    <div class="p-3 bg-primary-color">
        <h1 class="text-white font-bold text-md capitalize">{{$title}}</h1>
    </div>
    <section class="mx-auto rounded-2xl px-8 py-6 ">
        <!--<div class="flex items-center justify-between">
            <span class="text-emerald-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
              </svg>
            </span>
        </div>-->
        @if($user)
        <div class="mt-2 w-fit mx-auto">
            <img src="{{$user->profile_photo_url}}" class="rounded-full w-28 " alt="Profile picture" srcset="">
        </div>

        <div class="mt-8 ">
            <h2 class="text-black font-bold text-2xl tracking-wide">{{$user->name}}</h2>
        </div>
        <p class="text-primary-color font-semibold mt-2.5" >
            {{$user->position->name}}
        </p>

        <div class="mt-3 grid grid-cols-2 gap-8 text-white text-sm">
            <a href="mailto:{{$user->email}}" title="Contact"  class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-black bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-0">
                <svg xmlns="http://www.w3.org/2000/svg"  class="-ml-1 mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contact
            </a>
            <a href="{{route('users.show',$user)}}" title="Show" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-color hover:bg-secondary-color focus:outline-none focus:ring-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                Show
            </a>
        </div>
        @else
            <div class="h-48 flex justify-center items-center">
                <div>
                    <h1 class="text-center text-2xl font-light capitalize">{{__('No test manager found')}}</h1>
                </div>
            </div>
        @endif

    </section>
</div>

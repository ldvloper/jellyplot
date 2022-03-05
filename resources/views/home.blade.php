<x-web-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jellyplot') }}
        </h2>
    </x-slot>
    <!-- Hero section -->
    <div class="h-screen flex flex-col justify-center pb-20 align-middle px-10 lg:2/6 xl:w-2/4 lg:ml-16 text-left">
        <div class="text-6xl font-semibold text-gray-900 dark:text-white leading-none">Bring all your work together</div>
        <div class="pt-10 text-xl font-light text-true-gray-500 antialiased">More functionalities, better experience for you and less stress your team.</div>
        <a href="{{route('dashboard')}}" class="inline-block mt-6 px-8 py-4 rounded-full font-normal w-1/3  bg-primary-color from-blue-600 to-blue-700 text-white outline-none focus:outline-none hover:shadow-lg hover:from-blue-700 transition duration-200 ease-in-out">
            {{__('My Dashboard')}}
        </a>
    </div>
    <x-features.general-home-features/>

</x-web-layout>


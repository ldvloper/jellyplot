<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
</svg>
<span class="px-2 text-gray-700 md:text-gray-400 ">{{__('Magic tool')}}</span>
@if(!$device->isMobile() || !$device->isTablet())
    <span style="opacity: 1;" class="hidden sm:block sm:text-gray-400 text-gray-400 text-sm leading-5 py-0.5 px-1.5 border border-gray-300 rounded-md">
             <span class="sr-only">Press </span>
        <kbd class="font-sans">
            <abbr title="Command" class="no-underline">Ctrl</abbr>
        </kbd>
        <span class="sr-only"> and </span><kbd class="font-sans">K</kbd>
        <span class="sr-only"> to search</span>
        /
        <span class="sr-only">Press </span>
        <kbd class="font-sans">
            <abbr title="Command" class="no-underline">⌘</abbr>
        </kbd>
        <span class="sr-only"> and </span><kbd class="font-sans">K</kbd>
        <span class="sr-only"> to search</span>
    </span>
@endif

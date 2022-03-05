<div
    class="relative w-full z-40 max-h-28 overflow-auto text-sm rounded-b-md focus:bg-primary-color"
    x-show="isOpen"
>
    @if(!$emptyOptions)
        @foreach($options as $option)
            @include($searchOptionItem, [
                'option' => $option,
                'index' => $loop->index,
                'styles' => $styles,
            ])
        @endforeach
    @elseif ($isSearching)
        @include($searchNoResultsView, [
            'styles' => $styles,
        ])
    @endif
</div>

<div class="w-full flex items-center justify-center mb-4">
    <form wire:submit.prevent="save" class="w-full bg-white rounded-b-md pt-2">
        <div x-cloak x-data="{ count: 0 }" x-init="count = $refs.countme.value.length" class="flex flex-wrap mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Comment</h2>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea wire:model.lazy="comment" x-ref="countme" x-on:keyup="count = $refs.countme.value.length" maxlength="1000" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:ring-primary-color focus:border-transparent focus:bg-white" name="body" placeholder='{{__('Type Your Comment')}}'></textarea>
                @error('comment')
                    <span class="text-sm text-red-700 ml-2 error self-center">*{{ $message }}</span>
                @enderror
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs md:text-sm pt-px">Maximum  <span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span> characters</p>
                </div>
                <div class="-mr-1">
                    <input type='submit' class="bg-primary-color text-white font-medium py-1 px-4 border border-transparent rounded-lg tracking-wide mr-1 hover:bg-secondary-color" value='Post Comment'>
                    @if (session()->has('commentErrorResponse'))
                        <div class="mt-2">
                             <span class="text-sm font-light text-red-700 pr-5">
                                     {{ session('commentErrorResponse') }}
                             </span>
                        </div>
                    @endif
                    @if (session()->has('commentResponse'))
                        <div class="mt-2">
                             <span class="text-sm font-light text-green-600 pr-5">
                                {{ session('commentResponse') }}
                             </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>

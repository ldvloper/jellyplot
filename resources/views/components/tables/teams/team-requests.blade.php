<div class="flex flex-col ">
    <div class="-my-2 sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="max-h-36 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                @if($requests->isNotEmpty())
                    <table class="min-w-full divide-y divide-gray-200 rounded-md">
                        <thead class="bg-primary-color text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    {{__('Name')}}
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                    {{__('Email')}}
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="overflow-auto">
                            @foreach($requests as $request)
                                <tr class="border-2 border-gray-100 dark:border-gray-800 text-center">
                                    <td class="py-2 text-sm">
                                        {{$request->user->name}}
                                    </td>
                                    <td class="py-2 text-sm">
                                       <input class="border-none focus:ring-transparent" id="copy_{{$request->user->id}}" type="text" value="{{ $request->user->email }}" readonly>
                                    </td>
                                    <td class="py-2 text-sm">
                                        <button class="hover:text-primary-color" type="button" value="copy" onclick="copyToClipboard('copy_{{$request->user->id}}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="grid grid-cols-1 gap-1 justify-items-center content-center font-semibold text-gray-300 py-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z" />
                            </svg>
                            <p class="text-justify">
                                No Request Found
                            </p>
                        </div>
                    @endif
            </div>
            @if($requests->links('vendor.livewire.pagination.tailwind'))
                <div class="p-5">
                    {{ $requests->links('vendor.livewire.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
    }
</script>

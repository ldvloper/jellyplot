<select
    name="{{ $name }}"
    class="w-full mt-1 focus:ring-primary-color focus:border-primary-color shadow-sm text-sm border-gray-300 rounded-md"
    wire:model="value">

    <option value="">
        {{ $placeholder }}
    </option>

    @foreach($options as $option)
        <option value="{{ $option['value'] }}">
            {{ $option['description'] }}
        </option>
    @endforeach
</select>

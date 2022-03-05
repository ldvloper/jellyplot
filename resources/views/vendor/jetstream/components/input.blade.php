@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-primary-color focus:ring focus:ring-primary-color focus:ring-opacity-50 rounded-md shadow-sm']) !!}>

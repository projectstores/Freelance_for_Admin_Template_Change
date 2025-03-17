<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['label','color'])
<x-button :label="$label" :color="$color" {{ $attributes }}>

{{ $slot ?? "" }}
</x-button>
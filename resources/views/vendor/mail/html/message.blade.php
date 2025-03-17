<x-mail::layout>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
    <span>© {{ date('Y') }} {{ config('app.name') }}</span>
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>

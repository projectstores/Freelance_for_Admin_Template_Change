@props(['label', 'placeholder', 'model', 'options', 'isDefer', 'isAssociative', 'componentId', 'value', 'text', 'selected' => null, 'class' => null, 'show_option_insead' => false])

<div class="relative default-select2 {{ $errors->first($model) ? 'select2-custom-has-error' : '' }}">
    <label class="text-lg font-medium block mb-1 {{ $errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-black dark:text-white' }}">{{ htmlspecialchars_decode($label) }}</label>

    <select data-pharaonic="select2" data-component-id="{{ $componentId }}" wire:model{{ $isDefer ? '.defer' : '' }}="{{ $model }}" id="select2-id-{{ $model }}" data-placeholder="{{ $placeholder }}" class="{{ $class ? $class : 'select2' }}" {{ $attributes }} data-dir="{{ config()->get('direction') }}" style="display: none;" onload="this.style.display = 'block'">
        <option value=""></option>
        @foreach ($options as $key => $option)

            {{-- Check if type of array associative --}}
            @if (!$isAssociative)
                <option value="{{ $option[$value] }}" {{ $selected && $selected === $option[$value] ? "selected" : "" }}>{{ $option[$text] }}</option> 
            @elseif ($show_option_insead)
                <option value="{{ $option }}" {{ $selected && $selected === $option ? "selected" : "" }}>{{ $option }}</option>
            @else
                <option value="{{ $key }}" {{ $selected && $selected === $key ? "selected" : "" }}>{{ $key }}</option>
            @endif

        @endforeach
    </select>
    @error($model)
        <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first($model) }}</p>
    @enderror

</div>

<style>

.select2 {
    border: 2px solid #f0f0f0; /* Change the border color and width */
    border-radius: 0.5rem; /* Adjust the border radius */
    color: #000; /* Set the text color */
}

</style>

@pushOnce('styles')

    {{-- Select2 --}}
    <link href="{{ url('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" />

@endPushOnce

@pushOnce('scripts')

    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- Select2 --}}
    <script src="{{ url('node_modules/select2/dist/js/select2.min.js') }}"></script>

    {{-- Pharaonic select2 --}}
    <script src="{{ url('public/vendor/pharaonic/pharaonic.select2.min.js') }}"></script>

@endPushOnce
<div class="w-full">

    {{-- Overview step --}}
    @if ($step === 'overview')
        @livewire('admin.gigs.options.steps.overview', ['gig' => $gig])
    @endif

    {{-- Pricing step --}}
    @if ($step === 'pricing')
        @livewire('admin.gigs.options.steps.pricing', ['gig' => $gig])
    @endif

    {{-- Requirements step --}}
    @if ($step === 'requirements')
        @livewire('admin.gigs.options.steps.requirements', ['gig' => $gig])
    @endif

    {{-- Gallery step --}}
    @if ($step === 'gallery')
        @livewire('admin.gigs.options.steps.gallery', ['gig' => $gig])
    @endif

</div>
@if($cdn)
    @pushonce('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
    @endpushonce
    @pushonce('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/min/tiny-slider.js"></script>
    @endpushonce
@endif

<{{ $container }} id="{{ $id }}" {{ $attributes }}>
    {{ $slot }}
</{{ $container }}>

@push('scripts')
<script type="module">
    (function() {
        const initSlider = () => {
            const {{ $export }} = tns(@json($pluginOptions));
            @if($clientScript)
                const script_{{ $export }} = ({!! $clientScript !!});
                if (typeof script_{{ $export }} === 'function') script_{{ $export }}({{ $export }});
            @endif
        };

        if (document.readyState === 'complete') {
            initSlider();
        } else {
            window.addEventListener('load', initSlider);
        }
    })();
</script>
@endpush
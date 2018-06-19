<div class="block">
    <ul class="nav nav-tabs nav-tabs-block {{ isset($disabled) ? 'js-tabs-enabled' : '' }}" data-toggle="tabs" role="tablist">
        {{ $links }}
    </ul>
    <div class="block-content block-content-full tab-content overflow-hidden">

        {{ $slot }}

    </div>
</div>
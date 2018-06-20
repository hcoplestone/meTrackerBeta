<div class="block">
    <ul data-toggle="tabs" role="tablist" class="nav nav-tabs nav-tabs-block {{ isset($disabled) ? 'js-tabs-enabled' : '' }}">
        {{ $links }}
    </ul>
    <div class="block-content block-content-full tab-content overflow-hidden">
        {{ $slot }}
    </div>
</div>
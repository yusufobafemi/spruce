<div class="stat-box">
    <div class="stat-icon">
        <i class="{{ $icon }}"></i>
    </div>
    <div class="stat-info">
        <h3>{{ $title }}</h3>
        <div class="stat-value" @if($count) data-count="{{ $count }}" @endif>
            {{ $count ? 0 : $value }}
        </div>
        @if($subtitle)
            <div class="stat-period">{{ $subtitle }}</div>
        @endif
    </div>
</div>

<div>
    <div class="page-header">
        <h1>Dashboard Overview</h1>
        <div class="date-picker">
            @foreach (['Today', 'Week', 'Month', 'Year'] as $label)
                <button class="date-btn {{ strtolower($label) === 'today' ? 'active' : '' }}" 
                        data-period="{{ strtolower($label) }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>        
    </div>

    <!-- Stats Cards -->
    <div class="stats-container">
        @foreach ($stats as $stat)
            <div class="stat-card {{ $stat['type'] }}">
                <div class="stat-icon">
                    <i class="{{ $stat['icon'] }}"></i>
                </div>
                <div class="stat-details">
                    <h3>{{ $stat['title'] }}</h3>
                    <div class="stat-number" data-count="{{ $stat['count'] }}">
                        0{{ $stat['suffix'] ?? '' }}
                    </div>
                    <div class="stat-change {{ $stat['change_type'] }}">
                        <i class="fas fa-arrow-{{ $stat['change_type'] === 'positive' ? 'up' : 'down' }}"></i>
                        {{ $stat['change'] }}% <span class="vs-period">vs {{ $stat['period'] === 'today' ? 'yesterday' : 'last '.strtolower($stat['period']) }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


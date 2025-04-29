@extends('layouts.app')

@section('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/dashboard.blade.css') }}">
<link rel="stylesheet" href="{{ asset('css/subscribers.css') }}">
@endsection
@section('content')
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <h3 class="admin">Admin Dashboard</h3>
                </div>
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="sidebar-content">
                <nav class="sidebar-menu">
                    <ul>
                        <li class="active">
                            <a href="#" class="sidebar-link" data-url="{{ route('admin.dashboard') }}" data-script="dashboard"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-link" data-url="{{ route('admin.subscribers') }}" data-script="subscribers"><i class="fas fa-chart-line"></i> <span>Subscribers</span></a>
                        </li>
                        {{-- <li>
                            <a href="#users"><i class="fas fa-users"></i> <span>Users</span></a>
                        </li>
                        <li>
                            <a href="#downloads"><i class="fas fa-download"></i> <span>Downloads</span></a>
                        </li>
                        <li>
                            <a href="#settings"><i class="fas fa-cog"></i> <span>Settings</span></a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
            <div class="sidebar-footer">
                <a href="#" class="logout-btn" id="logoutBtn">
                    <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div id="ajaxLoader" class="loader-overlay" style="display: none;">
                <div class="spinner"></div>
            </div>            
            <div class="dashboard-content">
                {{-- this is where the items will inseted --}}
                @include('admin.partials.dashboard')
            </div>
        </main>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script>
    document.getElementById('logoutBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default anchor behavior
        
        // Create a new form dynamically
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route('logout') }}';
        
        // Add the CSRF token as a hidden field
        var csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        form.appendChild(csrfToken);
        
        // Submit the form
        document.body.appendChild(form);
        form.submit();
    });
</script>
@endsection

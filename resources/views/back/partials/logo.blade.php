<style>

    .sidebar-brand {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sidebar-brand img {
        width: 100%;
        height: 100%;
        object-fit:contain;
    }

</style>

<div class="sidebar-header">
    <a href="{{ route("dashboard.audios") }}" class="sidebar-brand">
        @if (file_exists(public_path('storage/moheli_logo.png')))
            <img src="{{  asset('storage/moheli_logo.png') }}" alt="Logo moheli">
        @else
            <i class="fas fa-broadcast-tower"></i>
            <span>Moheli back office</span>
        @endif
    </a>
</div>

<div id="loader">
    <div class="loader-content">
        <div class="loader-icon">
            @if (file_exists(public_path('storage/moheli_logo.png')))
                <img src="{{ asset("storage/moheli_logo.png") }}" alt="Logo moheli" style="width:450px; height:250px; object-fit:contain;">
            @else
                <i class="fas fa-broadcast-tower"></i>
            @endif
        </div>
        <div class="loader-text">MOHELI MATIN</div>
        <div class="loader-subtext" style="color: #fff">VOTRE MEDIA NUMERIQUE PAR TOUT ET POUR TOUT</div>
        <div class="progress-bar">
            <div class="progress" id="loadingProgress"></div>
        </div>
    </div>
</div>
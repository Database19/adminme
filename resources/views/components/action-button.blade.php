<div class="row mb-1 justify-content-end">
    <div class="col-auto">
    </div>
    <p>
        @php
            $route = Route::current()->getName();
            $route = explode('.', $route);
            $route = $route[0].'.'.'create';
        @endphp
    </p>
    <div class="col-auto">
        <a href="{{ route($route) }}" class="btn-ved btn-sm success-btn">Tambah</a>
    </div>
</div>

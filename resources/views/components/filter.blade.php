<div class="col-md-6">
    <button type="button" class="btn-ved btn-sm primary-btn mb-1" onclick="toggleFilters()">Filter</button>
    <div class="card-style-1 mb-1" style="display:none;" id="filters">
        <form action="#" method="POST">
            @csrf
            @method('POST')
            <div class="filters m-2">
                <div class="mb-1 d-flex flex-column flex-md-row align-items-center">
                    <label for="filter_name" class="form-label me-2">Nama&nbsp;&nbsp;&nbsp;:</label>
                    <input type="text" class="form-control form-control-sm" id="filter_name" name="filter_name" placeholder="Cari berdasarkan nama">
                </div>
                <div class="mb-1 d-flex flex-column flex-md-row align-items-center">
                    <label for="filter_city" class="form-label me-2">Kota&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                    <input type="text" class="form-control form-control-sm" style="margin-left: 2px;" id="filter_city" name="filter_city" placeholder="Cari berdasarkan kota">
                </div>
                <div class="mb-1 d-flex flex-column flex-md-row align-items-center">
                    <label for="filter_status" class="form-label me-2">Status&nbsp;&nbsp;:</label>
                    <select class="form-select form-select-sm" id="filter_status" name="filter_status">
                        <option value="">Pilih Status</option>
                        <option value="active">Aktif</option>
                        <option value="inactive">Tidak Aktif</option>
                    </select>
                </div>
                <div class="mb-1 d-flex justify-content-start">
                    <button type="submit" class="btn-ved btn-primary btn-sm btn-hover">Terapkan Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function toggleFilters() {
    var filtersDiv = document.getElementById('filters');
    if (filtersDiv.style.display === 'none') {
        filtersDiv.style.transition = 'all 0.5s ease';
        filtersDiv.style.display = 'block';
        filtersDiv.style.opacity = 0;
        setTimeout(function() {
            filtersDiv.style.opacity = 1;
        }, 10); // Delay to allow display change to take effect
    } else {
        filtersDiv.style.transition = 'opacity 0.5s ease';
        filtersDiv.style.opacity = 0;
        setTimeout(function() {
            filtersDiv.style.display = 'none';
        }, 500); // Delay to match transition duration
    }
}
</script>

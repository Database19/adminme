import $ from 'jquery';

$(function() {
    // Menampilkan loader saat klik link atau tombol submit
    $('a, button[type="submit"]').on('click', function(e) {
        $('.loader').show();

        var href = $(this).attr('href');
        if (href) {
            e.preventDefault();
            window.location.href = href;
        }
    });

    // Menyembunyikan loader ketika permintaan AJAX selesai
    $(document).ajaxComplete(function() {
        $('.loader').hide();
    });

    // Menyembunyikan loader ketika halaman selesai dimuat
    $(window).on('load', function() {
        $('.loader').hide();
    });
});



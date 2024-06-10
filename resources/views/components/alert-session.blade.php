<div class="col-md-12">
    @if (session('success'))
        <div class="alert alert-success" role="alert" style="transition: opacity 3s ease-in-out; opacity: 1;" onanimationend="this.style.opacity = 0;">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alert-success').style.opacity = 0;
            }, 3000);
        </script>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert" style="transition: opacity 3s ease-in-out; opacity: 1;" onanimationend="this.style.opacity = 0;">
            {{ session('error') }}
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alert-danger').style.opacity = 0;
            }, 3000);
        </script>
    @endif
</div>

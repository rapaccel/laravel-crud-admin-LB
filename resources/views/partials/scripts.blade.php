<!-- Required vendors -->
<script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assets/js/quixnav-init.js') }}"></script>
<script src="{{ asset('assets/js/custom.min.js') }}"></script>

<script src="{{ asset('assets/vendor/highlightjs/highlight.pack.min.js') }}"></script>
<script src="./vendor/global/global.min.js"></script>
<script src="./js/quixnav-init.js"></script>
<script src="./js/custom.min.js"></script>



<script src="./vendor/global/global.min.js"></script>
<script src="./js/quixnav-init.js"></script>
<script src="./js/custom.min.js"></script>


<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="./js/plugins-init/sweetalert.init.js"></script>



<script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assets/js/quixnav-init.js') }}"></script>
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins-init/sweetalert.init.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.sweet-confirm', function(e) {
            e.preventDefault();

            const formId = $(this).closest('form').data('form');
            const form = $(`form[data-form="${formId}"]`)[0];

            Swal.fire({
                title: 'Hapus Data',
                text: 'Apakah anda yakin ingin menghapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                closeOnConfirm: false
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form when confirmed
                } else {
                    Swal.fire(
                        'Dibatalkan',
                        'Data kamu aman ツ',
                        'error'
                    );
                }
            });
        });
    });
</script>



<script>
    $(document).ready(function() {
        // Jika terdapat pesan sukses, tampilkan SweetAlert success
        @if (session()->has('success'))
            Swal.fire({
                title: 'SUKSES',
                text: '{{ session('success') }}',
                icon: 'success',
                timer: 3000, // Tampilkan pesan selama 3 detik
                showConfirmButton: false
            });
        @endif
    });
</script>


<script src="./vendor/circle-progress/circle-progress.min.js"></script>
<script src="./vendor/chart.js/Chart.bundle.min.js"></script>

<script src="./vendor/gaugeJS/dist/gauge.min.js"></script>

<!--  flot-chart js -->
<script src="./vendor/flot/jquery.flot.js"></script>
<script src="./vendor/flot/jquery.flot.resize.js"></script>

<!-- Owl Carousel -->
<script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>

<!-- Counter Up -->
<script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
<script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
<script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>


<script src="./js/dashboard/dashboard-1.js"></script>
<!-- Circle progress -->

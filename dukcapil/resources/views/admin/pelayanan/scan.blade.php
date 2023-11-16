@include('main')

<body>
    <script src="assets/static/js/initTheme.js"></script>

    <div id="app">
        @include('partials.sidebar')
        @include('sweetalert::alert')
        <div id="main">
            <header class="mb-3">
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-content">
                <section class="row">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div id="reader" width="600px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header text-center"><b>DETAIL DATA PEMILIH</b></div>
                                    <div id="alert-success" class="alert alert-success" style="display: none">
                                        Berhasil Mengambil Data
                                    </div>
                                    <div id="alert-danger" class="alert alert-danger" style="display: none">

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>ID Pengajuan</th>
                                                <td id="id_pengajuan">-</td>
                                            </tr>
                                            <tr>
                                                <th>status</th>
                                                <td id="status">-</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pengajuan</th>
                                                <td id="nama_pengajuan">-</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Pengajuan</th>
                                                <td id="tanggal_pengajuan">-</td>
                                            </tr>
                                        </table>
                                        <div class="text-center">
                                            <button type="button" id="btnKonfirmasi"
                                                class="btn btn-primary d-none">Konfirmasi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>


        </div>
    </div>
    @include('partials.footer')
    </div>
    @include('partials.script')

</body>

<!-- JS Libraies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<!-- Sertakan skrip SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    var app = {
        LinkApi: '{{ env('APP_URL') }}'
    };



    function onScanSuccess(decodedText, decodedResult) {
        let idPengajuan = decodedText;
        let alertSuccess = document.getElementById('alert-success');
        let alertFailed = document.getElementById('alert-danger');
        let idPengajuanElement = document.getElementById('id_pengajuan');
        let tanggalPengajuan = document.getElementById('tanggal_pengajuan');
        let namaPengajuan = document.getElementById('nama_pengajuan');
        let status = document.getElementById('status');

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({

            url: app.LinkApi + "/admin/data-scan/" + idPengajuan,
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,

            },
            success: function(response) {
                console.log(response)
                if (response.success) {
                    // Berhasil mengambil data, tampilkan alert sukses
                    alertFailed.style.display = 'none';
                    alertSuccess.style.display = 'block';
                    alertSuccess.textContent = 'Berhasil Mengambil Data';

                    // Tampilkan data nama dan NIK pada tabel

                    namaPengajuan.textContent = response.result.nama_pengajuan;
                    idPengajuanElement.textContent = response.result.id_pengajuan;
                    tanggalPengajuan.textContent = response.result.tanggal_pengajuan;
                    status.textContent = response.result.status;



                } else {
                    // Gagal mengambil data, tampilkan alert gagal
                    alertSuccess.style.display = 'none';
                    // Sembunyikan alert sukses
                    alertFailed.style.display = 'block'; // Sembunyikan alert sukses

                    alertFailed.textContent = response.message;

                    idPengajuanElement.textContent = "-";


                    namaPengajuan.textContent = "-";
                    tanggalPengajuan.textContent = "-";
                    status.textContent = "-";
                }
            },
            error: function() {
                // Gagal mengirim permintaan AJAX, tampilkan alert gagal
                alertSuccess.style.display = 'none'; // Sembunyikan alert sukses
                alertFailed.style.display = 'block'; // Sembunyikan alert sukses

                alertFailed.textContent = "Terjadi Kesalahan pada server";
                idPengajuanElement.textContent = "-";


                namaPengajuan.textContent = "-";
                tanggalPengajuan.textContent = "-";
                status.textContent = "-";
            }
        });
    }

    function onScanFailure(error) {
        // Tangani kesalahan pemindaian
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        false
    );
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);


    document.getElementById('btnKonfirmasi').addEventListener('click', function() {
        // Mengambil data dari elemen-elemen HTML
        let tanggalPengajuan_text = document.getElementById('tanggal_pengajuan');
        let namaPengajuan_text = document.getElementById('nama_pengajuan');
        let idPengajuan_text = document.getElementById('id_pengajuan');
        let status_text = document.getElementById('status');
        let alertSuccess = document.getElementById('alert-success');
        let alertFailed = document.getElementById('alert-danger');
        let tanggal_pengajuan = document.getElementById('tanggal_pengajuan').textContent;
        let nama_pengajuan = document.getElementById('nama_pengajuan').textContent;
        let id_pengajuan = document.getElementById('id_pengajuan').textContent;
        let status = "selesai";



        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: "{{ route('change-status.scan') }}",
            
            data: {
                _token: CSRF_TOKEN,
                id_pengajuan:id_pengajuan,
                kondisi:status,
                tanggal_pengajuan:tanggal_pengajuan,
                nama_pengajuan:nama_pengajuan
            },

            dataType: 'json', 
            success: function(response) {
                console.log(response)
                if (response.success) {
                    // Menampilkan SweetAlert jika berhasil
                    tanggalPengajuan_text.textContent = "-";
                    namaPengajuan_text.textContent = "-";
                    idPengajuan_text.textContent = "-";
                    status_text.textContent = "-";
                    alertSuccess.style.display = 'none'; // Sembunyikan alert sukses
                    alertFailed.style.display = 'none';
                    Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message
                        });
                } else {
                    // Menampilkan SweetAlert jika terjadi kesalahan
                    Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: response.message
                        });

                }
            },
            error: function() {
                // Menampilkan SweetAlert jika terjadi kesalahan AJAX
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan dalam mengirim data.'
                });
            }
        });
    });
</script>

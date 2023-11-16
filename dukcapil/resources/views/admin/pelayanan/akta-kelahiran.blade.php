@include('main')

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    @include('partials.sidebar')
    @include('sweetalert::alert')
    <div id="app">
        <div id="main">
            @include('partials.header')
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Akta Kelahiran</h3>
                            <p class="text-subtitle text-muted">

                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <p style="color:#435EBE">pelayanan</p>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Akta Kelahiran
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Data Akta Kelahiran</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID Pengajuan</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Tanggal Pengambilan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($status === 'success')
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $d['id_pengajuan_akta_kelahiran'] }}</td>
                                                <td>{{ $d['nama_lengkap'] }}</td>
                                                <td>{{ $d['nik'] }}</td>
                                                <td>{{ $d['tanggal_pengajuan'] }}</td>
                                                <td>
                                                    @if ($d['tanggal_pengambilan'] === null)
                                                        Belum Terkonfirmasi
                                                    @else
                                                        {{ $d['tanggal_pengambilan'] }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge 
                                                        {{ $d['status'] === 'menunggu' ? 'bg-warning' : 
                                                        ($d['status'] === 'terkonfirmasi' ? 'bg-info' : 
                                                        ($d['status'] === 'selesai' ? 'bg-success' : 'bg-danger')) }}">
                                                        {{ $d['status'] }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-secondary detail-button"
                                                        data-bs-toggle="modal" data-bs-target="#detail"
                                                        data-id-pengajuan={{ $d['id_pengajuan_akta_kelahiran'] }}
                                                        data-ktp-ibu={{ $d['ktp_ibu'] }}
                                                        data-ktp-saksi-pertama={{ $d['ktp_saksi_pertama'] }}
                                                        data-ktp-saksi-kedua={{ $d['ktp_saksi_kedua'] }}
                                                        data-ktp-ayah={{ $d['ktp_ayah'] }}
                                                        data-surat-lahir={{ $d['surat_keterangan_lahir'] }}
                                                        data-akta-nikah={{ $d['akta_nikah'] }}
                                                        data-formulir-f102={{ $d['formulir_f102'] }}
                                                        data-formulir-f106={{ $d['formulir_f101'] }}>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">{{ $message }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        
            <div class="modal fade text-left" id="detail" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Dokumen Pengajuan</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-striped table-md">

                                <tr>
                                    <td><b>KTP Ayah</b></td>
                                    <td> <a href="#" target="_blank"id="detailKtpAyah">Lihat KTP Ayah</a></td>
                                </tr>
                                <tr>
                                    <td><b>KTP Ibu</b></td>
                                    <td> <a href="#" target="_blank"id="detailKtpIbu">Lihat KTP Ibu</a></td>
                                </tr>
                                <tr>
                                    <td><b>KTP Saksi Pertama</b></td>
                                    <td> <a href="#" target="_blank"id="detailKtpSaksiPertama">Lihat KTP Saksi Pertama</a></td>
                                </tr>
                                <tr>
                                    <td><b>KTP Saksi Kedua</b></td>
                                    <td> <a href="#" target="_blank"id="detailKtpSaksiKedua">Lihat KTP Saksi Kedua</a></td>
                                </tr>
                                
                                <tr>
                                    <td><b>Surat Keterangan Lahir</b></td>
                                    <td> <a href="#" target="_blank"id="detailSuratLahir">Lihat Surat Keterangan Lahir</a></td>
                                </tr>
                                <tr>
                                    <td><b>Akta Nikah</b></td>
                                    <td> <a href="#" target="_blank"id="detailAktaNikah">Lihat Akta Nikah</a></td>
                                </tr>
                                <tr>
                                    <td><b>Formulir F102</b></td>
                                    <td> <a href="#" target="_blank"id="detailFormulirF102">Lihat Formulir
                                            F.02</a></td>
                                </tr>
                                <tr>
                                    <td><b>Formulir F101</b></td>
                                    <td> <a href="#" target="_blank"id="detailFormulirF101">Lihat Formulir
                                            F01</a></td>
                                </tr>
                                <form action="{{ route('change-status.akta-kelahiran') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <tr>
                                                <td><label for="id_pengajuan" class="form-label">ID Pengajuan</label>
                                                </td>
                                                <td><input type="text" name="id_pengajuan" class="form-control"
                                                        id="id_pengajuan" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><label for="kondisi" class="form-label">Status</label></td>
                                                <td>
                                                    <select name="kondisi" class="form-select" id="kondisi"
                                                        onchange="toggleDateField()">
                                                        <option value="terkonfirmasi">Konfirmasi</option>
                                                        <option value="ditolak">Tolak</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr id="tanggal_pengajuan_row">
                                                <td><label for="tanggal_pengambilan" class="form-label">Tanggal
                                                        Pengajuan</label></td>
                                                <td><input type="date" name="tanggal_pengambilan"
                                                        class="form-control" id="tanggal_pengambilan" required></td>
                                            </tr>
                                        </div>
                                    </div>

                            </table>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Accept</span>
                            </button>

                            <button type="button" class="btn" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
</body>
@include('partials.script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".detail-button").click(function() {

            var akta_nikah = $(this).data("akta-nikah");
            var surat_lahir = $(this).data("surat-lahir");           
            var formulir_f102 = $(this).data("formulir-f102");
            var formulir_f101 = $(this).data("formulir-f101");
            var ktpAyah=$(this).data('ktp-ayah');
            var ktpIbu=$(this).data('ktp-ibu');
            var ktpSaksiPertama=$(this).data('ktp-saksi-pertama');
            var ktpSaksiKedua=$(this).data('ktp-saksi-kedua');
            var idPengajuan = $(this).data('id-pengajuan')
            var linkApi =
                "{{ app('LinkApi') }}";

            ;
            var surat_lahirLink = linkApi + surat_lahir;
            var akta_nikahLink = linkApi + akta_nikah;
            var formulir_f102Link = linkApi + formulir_f102;
            var formulir_f101Link = linkApi + formulir_f101;
            var ktp_ayahLink=linkApi+ktpAyah;
            var ktp_IbuLink=linkApi+ktpIbu;
            var ktp_SaksiPertamaLink=linkApi+ktpSaksiPertama;
            var ktp_SaksiKeduaLink=linkApi+ktpSaksiKedua;

            $('#id_pengajuan').val(idPengajuan)
            $("#detailKtpSaksiPertama").attr("href", ktp_SaksiPertamaLink);
            $("#detailKtpSaksiKedua").attr("href", ktp_SaksiKeduaLink);
            $("#detailKtpIbu").attr("href", ktp_IbuLink);
            $("#detailKtpAyah").attr("href", ktp_ayahLink);
            $("#detailSuratLahir").attr("href", surat_lahirLink);
            $("#detailAktaNikah").attr("href", akta_nikahLink);
            $("#detailFormulirF102").attr("href", formulir_f102Link);
            $("#detailFormulirF101").attr("href", formulir_f101Link);


            $("#detail").modal("show");

        });
    });
</script>
<script>
    function toggleDateField() {
        var kondisiSelect = document.getElementById("kondisi");
        var tanggalPengajuanRow = document.getElementById("tanggal_pengajuan_row");

        if (kondisiSelect.value === "ditolak") {
            tanggalPengajuanRow.style.display = "none";
        } else {
            tanggalPengajuanRow.style.display = "table-row";
        }
        var kondisiSelect = document.getElementById('kondisi');
    var tanggalPengambilanInput = document.getElementById('tanggal_pengambilan');
    
    // Cek apakah opsi yang dipilih adalah 'terkonfirmasi'
    if (kondisiSelect.value === 'terkonfirmasi') {
        tanggalPengambilanInput.setAttribute('required', 'required');
        tanggalPengambilanInput.value = ''; // Nolkan nilai jika perlu
    } else {
        tanggalPengambilanInput.removeAttribute('required');
        tanggalPengambilanInput.value = ''; // Nolkan nilai jika perlu
    }
    }
</script>

<script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>

</html>

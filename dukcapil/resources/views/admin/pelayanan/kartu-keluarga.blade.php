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
                            <h3>Kartu Keluarga</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <p style="color:#435EBE">pelayanan</p>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Kartu Keluarga
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Data Kartu Keluarga</h5>
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
                                                <td>{{ $d['id_pengajuan_kk'] }}</td>
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
                                                        data-id-pengajuan={{ $d['id_pengajuan_kk'] }}
                                                        data-akta-cerai={{ $d['akta_cerai'] }}
                                                        data-akta-kematian={{ $d['akta_kematian'] }}
                                                        data-akta-kelahiran={{ $d['akta_kelahiran'] }}
                                                        data-akta-nikah={{ $d['akta_nikah'] }}
                                                        data-formulir-f102={{ $d['formulir_f102'] }}
                                                        data-formulir-f106={{ $d['formulir_f106'] }}>
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
                                    <td><b>Akta Cerai</b></td>
                                    <td> <a href="#" target="_blank"id="detailAktaCerai">Lihat Akta Cerai</a></td>
                                </tr>
                                <tr>
                                    <td><b>Akta Kematian</b></td>
                                    <td> <a href="#" target="_blank"id="detailAktaKematian">Lihat Akta
                                            Kematian</a></td>
                                </tr>
                                <tr>
                                    <td><b>Akta Kelahiran</b></td>
                                    <td> <a href="#" target="_blank"id="detailAktaKelahiran">Lihat Akta
                                            Kelahiran</a></td>
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
                                    <td><b>Formulir F10</b></td>
                                    <td> <a href="#" target="_blank"id="detailFormulirF106">Lihat Formulir
                                            F.06</a></td>
                                </tr>
                                <form action="{{ route('change-status.kartu-keluarga') }}" method="POST">
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
                                                        Pengambilan</label></td>
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
    @include('partials.script')
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".detail-button").click(function() {
            var id_pengajuan=$(this).data('id-pengajuan')
            var akta_nikah = $(this).data("akta-nikah");
            var akta_kelahiran = $(this).data("akta-kelahiran");
            var akta_cerai = $(this).data("akta-cerai");
            var akta_kematian = $(this).data("akta-kematian");
            var formulir_f102 = $(this).data("formulir-f102");
            var formulir_f106 = $(this).data("formulir-f106");
            var suratPengantar = $(this).data("pengantar");
            var linkApi =
                "{{ app('LinkApi') }}";

            var suratPengantarLink = linkApi + suratPengantar;
            var akta_ceraiLink = linkApi + akta_cerai;
            var akta_kematianLink = linkApi + akta_kematian;
            var akta_kelahiranLink = linkApi + akta_kelahiran;
            var akta_nikahLink = linkApi + akta_nikah;
            var formulir_f102Link = linkApi + formulir_f102;
            var formulir_f106Link = linkApi + formulir_f106;

            $('#id_pengajuan').val(id_pengajuan)
            $("#detailSuratPengantarLink").attr("href", suratPengantarLink);
            $("#detailAktaCerai").attr("href", akta_ceraiLink);
            $("#detailAktaKematian").attr("href", akta_kematianLink);
            $("#detailAktaKelahiran").attr("href", akta_kelahiranLink);
            $("#detailAktaNikah").attr("href", akta_nikahLink);
            $("#detailFormulirF102").attr("href", formulir_f102Link);
            $("#detailFormulirF106").attr("href", formulir_f106Link);

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

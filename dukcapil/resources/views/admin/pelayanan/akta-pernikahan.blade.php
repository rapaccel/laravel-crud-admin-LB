@include('main')

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    @include('partials.sidebar')
    <div id="app">
        <div id="main">
            @include('partials.header')
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Akta Pernikahan</h3>           
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <p style="color:#435EBE">pelayanan</p>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Akta Pernikahan
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Data Akta Pernikahan</h5>
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
                                    @if ($status==='success') 
                                        @foreach ($data as $d)
                                                                        
                                            <tr>
                                                <td>{{ $d['id_pengajuan_ktp'] }}</td>
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
                                                    <span class="badge bg-success">{{ $d['status'] }}</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#update">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </button>
                                                    <button class="btn btn-secondary detail-button"
                                                        data-bs-toggle="modal" data-bs-target="#detail"
                                                        data-akta-cerai={{ $d['akta_cerai'] }}
                                                        data-akta-kematian={{ $d['akta_kematian'] }}
                                                        data-akta-kelahiran={{ $d['akta_kelahiran'] }}
                                                        data-akta-nikah={{ $d['akta_nikah'] }}
                                                        data-formulir-f102={{ $d['formulir_f102'] }}
                                                        data-formulir-f106={{ $d['formulir_f106'] }}>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-eye"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                            <path
                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
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
            {{-- Modal Update Status --}}
            <div class="modal fade text-left" id="update" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">Update Status Pengajuan</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Bonbon caramels muffin. Chocolate bar oat cake cookie pastry dragée pastry.
                                Carrot cake
                                chocolate tootsie roll chocolate bar candy canes biscuit.

                                Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet
                                roll. Toffee sugar
                                plum sugar plum jelly-o jujubes bonbon dessert carrot cake. Cookie dessert
                                tart muffin topping
                                donut icing fruitcake. Sweet roll cotton candy dragée danish Candy canes
                                chocolate bar cookie.
                                Gingerbread apple pie oat cake. Carrot cake fruitcake bear claw. Pastry
                                gummi bears
                                marshmallow jelly-o.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Accept</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal Detail --}}
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
                                    <td> <a href="#" target="_blank"id="detailAktaKematian">Lihat Akta Kematian</a></td>
                                </tr>
                                <tr>
                                    <td><b>Akta Kelahiran</b></td>
                                    <td> <a href="#" target="_blank"id="detailAktaKelahiran">Lihat Akta Kelahiran</a></td>
                                </tr>
                                <tr>
                                    <td><b>Akta Nikah</b></td>
                                    <td> <a href="#" target="_blank"id="detailAktaNikah">Lihat Akta Nikah</a></td>
                                </tr>
                                <tr>
                                    <td><b>Formulir F102</b></td>
                                    <td> <a href="#" target="_blank"id="detailFormulirF102">Lihat Formulir F.02</a></td>
                                </tr>
                                <tr>
                                    <td><b>Formulir F10</b></td>
                                    <td> <a href="#" target="_blank"id="detailFormulirF106">Lihat Formulir F.06</a></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>
    @include('partials.script')
</body>
<script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $(".detail-button").click(function() {

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
</html>

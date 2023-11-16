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
                            <h3>Akta Perceraian</h3>
                           
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <p style="color:#435EBE">pelayanan</p>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Akta Perceraian
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Data Akta Perceraian</h5>
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
                                    <tr>
                                        <td>Oleg</td>
                                        <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                        <td>0500 441046</td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
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
                                            <button class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                              </svg>
                                            </button>
                                        </td>
                                    </tr>
                                   
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
                            <div class="row">
                                <div class="col">
                                    <label>Akta Kelahiran</label>
                                    <br>
                                    <img id="akta_kelahiran" alt="preview akta kelahiran" width="200">
                                    <br>
                                </div>
                                <div class="col">
                                    <label>Akta Keluarga</label>
                                    <br>
                                    <img id="akta_keluarga" alt="preview Akta Keluarga" width="200">
                                    <br>
                                    <label class="mt-3">Deskripsi</label>
                                    <p id="deskripsi"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Surat Pengantar Rt/Rw</label>
                                    <br>
                                    <img id="surat_pengantar" alt="preview surat_pengantar" width="200">
                                    <br>
                                    <label class="mt-3">Deskripsi</label>
                                    <p id="deskripsi"></p>
                                </div>
                                <div class="col">
                                    <label>Formulir F.102</label>
                                    <br>
                                    <img id="formulir" alt="preview formulir" width="200">
                                    <br>
                                    <label class="mt-3">Deskripsi</label>
                                    <p id="deskripsi"></p>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <tr>
                                            <td><label for="id_pengajuan" class="form-label">ID Pengajuan</label></td>                                              
                                            <td><input type="text" name="id_pengajuan" class="form-control" id="id_pengajuan" disabled></td>                                               
                                        </tr>
                                        <tr>
                                            <td><label for="kondisi" class="form-label">Status</label></td>                                              
                                            <td>
                                              <select name="kondisi" class="form-select" id="kondisi" onchange="toggleDateField()">
                                                <option value="terkonfirmasi">Konfirmasi</option>
                                                <option value="ditolak">Tolak</option>
                                              </select>
                                            </td>                                               
                                          </tr>
                                        <tr id="tanggal_pengembalian_row">
                                            <td><label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label></td>                                              
                                            <td><input type="date" name="tanggal_pengembalian" class="form-control" id="tanggal_pengembalian"></td>                                               
                                          </tr>
                                    </div>
                                </div>
                            </form>
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

</html>

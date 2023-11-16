@include('layouts.main')

<body>

    @include('partials.header')
    @include('partials.sidebar')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div id="preloader" class="d-flex justify-content-center align-items-center" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.9);">
                <div class="sk-three-bounce">
                    <div class="sk-child sk-bounce1"></div>
                    <div class="sk-child sk-bounce2"></div>
                    <div class="sk-child sk-bounce3"></div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">LIBUR NGODING</p>
                    
                        </div>
                    </div>
                    {{-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                        </ol>
                    </div> --}}
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" data-toggle="modal" data-target="#addkategoriModal" class="btn btn-primary mb-3">Tambah kategori Baru</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px;text-align: center;">
                                        <thead>
                                            <tr>
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>
                                                
                                                
                                            </tr>
                                        </thead>
                              
                                    <tbody>
                                        @foreach ($kategoris as $kategori)
                                            
                                       
                                        <tr>
                                        <td>
                                            {{ $kategori->namaKategori }}
                                        </td>
                                       
                                        <td>
                                            {{-- <a href="#" ><i class="fa fa-eye btn bg-success"style="color: #ffffff; "></i></a> --}}
                                            <a href="#" class="btn bg-warning" data-toggle="modal" data-target="#editkategoriModal{{ $kategori->id }}">
                                                <i class="fa fa-pencil-square-o" style="color: #ffffff;"></i>
                                            </a>
                                            <form action="{{ route('kategoris.destroy',$kategori->id) }}" method="POST" class="d-inline" data-form="{{ $kategori->id }}">
                                                @method('delete')
                                                @csrf
                                                <button class="btn bg-danger btn sweet-confirm" id="delete" >
                                                    <i class="fa fa-trash" style="color: #ffffff;"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <div class="modal fade" id="editkategoriModal{{ $kategori->id }}" tabindex="-1" role="dialog" aria-labelledby="editkategoriModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editkategoriModalLabel">Edit kategori</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ route('kategoris.update', $kategori->id) }}">
                                                            @method('PUT')
                                                            @csrf
                                        
                                                            <div class="form-group">
                                                                <label for="namaKategori" class="form-label">nama keukategori</label>
                                                                <input type="text" class="form-control @error('namaKategori') is-invalid @enderror" id="namaKategori" name="namaKategori" value="{{ $kategori->namaKategori }}">
                                                                @error('namaKategori')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                        
                                                           
                                        
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        {{-- modal tambah --}}
        <div class="modal fade" id="addkategoriModal" tabindex="-1" role="dialog" aria-labelledby="addkategoriModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addkategoriModalLabel">Tambah kategori Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('kategoris.store') }}">
                            @csrf
                            
                            <div class="form-group">
                                <label for="namaKategori" class="form-label">nama kategori</label>
                                <input type="text" class="form-control @error('namaKategori') is-invalid @enderror" id="namaKategori" name="namaKategori" value="{{ old('namaKategori') }}">
                                @error('namaKategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                           
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->


            @include('partials.footer')
            

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    @include('partials.scripts')
    <script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>
    <!--**********************************
        Scripts
    ***********************************-->
    

</body>

</html>
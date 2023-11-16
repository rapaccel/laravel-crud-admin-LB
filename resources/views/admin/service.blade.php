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
                                <a href="#" data-toggle="modal" data-target="#serviceAddModal" class="btn btn-primary mb-3">Tambah service Baru</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px ; margin: 0">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Nama Service</th>
                                                <th style="text-align: center;">Aksi</th>
                                                
                                                
                                            </tr>
                                        </thead>
                              
                                    <tbody>
                                        @foreach ($services as $service)
                                            
                                       
                                        <tr>
                                        <td style="text-align: center;">
                                            {{ $service->nama_service }}
                                        </td>
                                       
                                        <td style="text-align: center;">
                                            {{-- <a href="#" ><i class="fa fa-eye btn bg-success"style="color: #ffffff; "></i></a> --}}
                                            <a href="#" class="btn bg-warning" data-toggle="modal" data-target="#editserviceModal{{ $service->id }}">
                                                <i class="fa fa-pencil-square-o" style="color: #ffffff;"></i>
                                            </a>
                                             <!-- Modal -->
                                            <div class="modal fade" id="editserviceModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="editserviceModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editserviceModalLabel">Edit service</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="{{ route('services.update', $service->id) }}">
                                                                @method('PUT')
                                                                @csrf
                                            
                                                                <div class="form-group">
                                                                    <label for="nama_service" class="form-label">Nama service</label>
                                                                    <input type="text" class="form-control @error('nama_service') is-invalid @enderror" id="nama_service" name="nama_service" value="{{ $service->nama_service }}">
                                                                    @error('service')
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
                                            <form action="{{ route('services.destroy',$service->id) }}" method="POST" class="d-inline" data-form="{{ $service->id }}">
                                                @method('delete')
                                                @csrf
                                                <button class="btn bg-danger btn sweet-confirm" id="delete" >
                                                    <i class="fa fa-trash" style="color: #ffffff;"></i>
                                                </button>
                                                </form>
                                        </td>
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
       <!-- Modal -->
<div class="modal fade" id="serviceAddModal" tabindex="-1" role="dialog" aria-labelledby="serviceAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviceAddModalLabel">Tambah Service Baru</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_service">nama service:</label>
                        <input type="text" name="nama_service" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah Service</button>
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
   
    <script src="{{asset('assets/js/plugins-init/sweetalert.init.js')}}"></script>
    <script src="{{asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <!--**********************************
        Scripts
    ***********************************-->
    

</body>

</html>
@include('layouts.main')

<body>

    @include('partials.header')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    @include('partials.sidebar')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div id="preloader">
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
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addunggulModal">Tambah unggul Baru</button>
                                    
                                    
                                </div>
                                
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px ;">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Nama Keunggulan</th>
                                                <th style="text-align: center;">deskripsi</th>
                                                <th style="text-align: center;">Service</th>
                                                <th style="text-align: center;">Aksi</th>
                                                
                                                
                                            </tr>
                                        </thead>
                              
                                    <tbody>
                                        @foreach ($ungguls as $unggul)
                                        
                                        <tr>
                                            
                                            <td style="text-align: center;">
                                               {{ $unggul->nama_unggul }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $unggul->deskripsi }}
                                            </td>
                                            <td style="text-align: center;">
                                                @foreach ($services as $service)
                                                    @if ($service->id === $unggul->service_id)
                                                        {{ $service->nama_service }}
                                                    @endif
                                                @endforeach
                                                
                                            </td>
                                           
                                           
                                        
                                            <td class="padding-2"style="display: flex; justify-content: center; align-items: center;">

                                                <a href="#" data-toggle="modal" class="btn bg-success" style="color: #ffffff;" data-target="#viewunggulModal{{ $unggul->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                
                                                
                                                
                                                <a href="#" class="btn bg-warning" data-toggle="modal" data-target="#editunggulModal{{ $unggul->id }}">
                                                    <i class="fa fa-pencil-square-o" style="color: #ffffff;"></i>
                                                </a>
                                            
                                                    
                                               
                                                <form action="{{ route('ungguls.destroy',$unggul->id) }}" method="POST" class="d-inline" data-form="{{ $unggul->id }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn bg-danger btn sweet-confirm" id="delete" >
                                                        <i class="fa fa-trash" style="color: #ffffff;"></i>
                                                    </button>
                                                </form>
                                            </td>
                                              {{-- modal update --}}
                         <div class="modal fade" id="editunggulModal{{ $unggul->id }}" tabindex="-1" role="dialog" aria-labelledby="editunggulModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editunggulModalLabel">Edit unggul</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('ungguls.update', $unggul->id) }}">
                                            @method('PUT')
                                            @csrf
                        
                                            <div class="form-group">
                                                <label for="nama_unggul" class="form-label">nama keuunggulan</label>
                                                <input type="text" class="form-control @error('nama_unggul') is-invalid @enderror" id="nama_unggul" name="nama_unggul" value="{{ $unggul->nama_unggul }}">
                                                @error('nama_unggul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                        
                                            <div class="form-group">
                                                <label for="deskripsi" class="form-label">deskripsi</label>
                                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ $unggul->deskripsi }}">
                                                @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                        
                                            <div class="form-group">
                                                <label for="service_id" class="form-label">Service</label>
                                                <select class="form-control @error('service_id') is-invalid @enderror" name="service_id" id="service_id">
                                                    <option value="">Pilih Service</option>
                                                    @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" {{ $unggul->service_id == $service->id ? 'selected' : '' }}>
                                                        {{ $service->nama_service }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('service_id')
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
                                                </div>
                                                </div>
                                            </div>
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
                   


                        
                        {{-- modal tambah --}}
                        <div class="modal fade" id="addunggulModal" tabindex="-1" role="dialog" aria-labelledby="addunggulModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addunggulModalLabel">Tambah Keunggulan Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('ungguls.store') }}">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label for="nama_unggul" class="form-label">nama keunggulan</label>
                                                <input type="text" class="form-control @error('nama_unggul') is-invalid @enderror" id="nama_unggul" name="nama_unggul" value="{{ old('nama_unggul') }}">
                                                @error('nama_unggul')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="deskripsi" class="form-label">deskripsi</label>
                                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
                                                @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="service" class="form-label">service</label>
                                                <select class="form-control"  name="service_id" id="service_id">
                                                   @foreach ($services as $service)
                                        
                                                  <option value="{{ $service->id }}">{{ $service->nama_service }}</option>
                                                  @endforeach
                                                </select>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--**********************************
        Scripts
    ***********************************-->
    

</body>

</html>
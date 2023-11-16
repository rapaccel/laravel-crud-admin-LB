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
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPriceModal">Tambah Harga Baru</button>
                                    
                                    
                                </div>
                                
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px ">
                                        <thead>
                                            <tr>
                                                <th>Price</th>
                                                <th>Diskon</th>
                                                <th>Service</th>
                                                <th style="text-align: center">Aksi</th>
                                                
                                                
                                            </tr>
                                        </thead>
                              
                                    <tbody>
                                        @foreach ($prices as $price)
                                        
                                        <tr>
                                            
                                            <td>
                                               {{ $price->price }}
                                            </td>
                                            <td>
                                                {{ $price->diskon }}
                                            </td>
                                            <td>
                                                @foreach ($services as $service)
                                                    @if ($service->id === $price->service_id)
                                                        {{ $service->nama_service }}
                                                    @endif
                                                @endforeach
                                                
                                            </td>
                                           
                                           
                                        
                                            <td class="padding-2"style="display: flex; justify-content: center; align-items: center;">

                                                <a href="#" data-toggle="modal" class="btn bg-success" style="color: #ffffff;" data-target="#viewpriceModal{{ $price->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                
                                                
                                                
                                                <a href="#" class="btn bg-warning" data-toggle="modal" data-target="#editPriceModal{{ $price->id }}">
                                                    <i class="fa fa-pencil-square-o" style="color: #ffffff;"></i>
                                                </a>

                                                {{-- modal update --}}
                                                <div class="modal fade" id="editPriceModal{{ $price->id }}" tabindex="-1" role="dialog" aria-labelledby="editPriceModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editPriceModalLabel">Edit Price</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="{{ route('prices.update', $price->id) }}">
                                                                    @method('PUT')
                                                                    @csrf
                                                
                                                                    <div class="form-group">
                                                                        <label for="price" class="form-label">Price</label>
                                                                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $price->price }}">
                                                                        @error('price')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                
                                                                    <div class="form-group">
                                                                        <label for="diskon" class="form-label">Diskon</label>
                                                                        <input type="number" class="form-control @error('diskon') is-invalid @enderror" id="diskon" name="diskon" value="{{ $price->diskon }}">
                                                                        @error('diskon')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                
                                                                    <div class="form-group">
                                                                        <label for="service_id" class="form-label">Service</label>
                                                                        <select class="form-control @error('service_id') is-invalid @enderror" name="service_id" id="service_id">
                                                                            <option value="">Pilih Service</option>
                                                                            @foreach ($services as $service)
                                                                            <option value="{{ $service->id }}" {{ $price->service_id == $service->id ? 'selected' : '' }}>
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
                                                
                                                <form action="{{ route('prices.destroy', $price->id) }}" method="POST" class="d-inline" data-form="{{ $price->id }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn bg-danger btn sweet-confirm" id="delete">
                                                        <i class="fa fa-trash" style="color: #ffffff;"></i>
                                                    </button>
                                                </form>
                                                
                                                
                                            </td>
                                                </div>
                                                </div>
                                            </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    <div class="card-body">
                                        <h4 class="card-title">Sweet Success</h4>
                                        <div class="card-content">
                                            <div class="sweetalert mt-5">
                                                <button class="btn btn-success btn sweet-success">Sweet Success</button>
                                            </div>
                                        </div>
                                </div>
                            </div>  
                             

                             
                            
                                  </div>
                                </div>
                              </div>
                        </div>
                        <div class="modal fade" id="addPriceModal" tabindex="-1" role="dialog" aria-labelledby="addPriceModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addPriceModalLabel">Tambah Price Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('prices.store') }}">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label for="price" class="form-label">Price</label>
                                                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                                                @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="diskon" class="form-label">Diskon</label>
                                                <input type="text" class="form-control @error('diskon') is-invalid @enderror" id="diskon" name="diskon" value="{{ old('diskon') }}">
                                                @error('diskon')
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
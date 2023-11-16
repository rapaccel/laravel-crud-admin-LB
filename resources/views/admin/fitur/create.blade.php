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
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                  

                                <form method="POST" action="{{ route('fiturs.store') }}" enctype="multipart/form-data">
                                  @csrf
                                  <div class="mb-3">
                                    <label for="nama_fitur" class="form-label">Nama Fitur</label>
                                    <input type="text"  class="form-control @error('nama_fitur')
                                    is-invalid
                                    @enderror " id="nama_fitur" name="nama_fitur" >
                                    @error('nama_fitur')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                          @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="gambar" class="form-label">gambar</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid"@enderror id="gambar" name="gambar" >
                                    @error('gambar')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                          @enderror
                                  </div>
                                
                                  <div class="mb-3">
                                    <label for="deskripsi" class="form-label">deskripsi</label>
                                    <input id="deskripsi" class=" @error('deskripsi') is-invalid @enderror"type="hidden" name="deskripsi">
                                  <trix-editor input="deskripsi"></trix-editor>
                                  @error('deskripsi')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                          @enderror
                                  </div>
                                  
                                  <div class="mb-3">
                                    <label for="service" class="form-label">service</label>
                                    <select class="form-control"  name="service_id" id="service_id">
                                      @foreach ($service as $service)
                            
                                      <option value="{{ $service->id }}">{{ $service->nama_service }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Tambah Blog</button>
                                </form>
              
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
    <!--**********************************
        Scripts
    ***********************************-->
    

</body>

</html>
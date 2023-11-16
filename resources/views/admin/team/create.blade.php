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
                  

                              <form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                  <label for="nama" class="form-label">nama</label>
                                  <input type="text"  class="form-control @error('nama')
                                  is-invalid
                                  @enderror " id="nama" name="nama" >
                                  @error('nama')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="foto" class="form-label">foto</label>
                                  <input type="file" class="form-control @error('foto') is-invalid"@enderror id="foto" name="foto" >
                                  @error('foto')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                              
                                <div class="mb-3">
                                  <label for="jabatan" class="form-label">jabatan</label>
                                  <input id="jabatan" class=" @error('jabatan') is-invalid @enderror"type="hidden" name="jabatan">
                                <trix-editor input="jabatan"></trix-editor>
                                @error('jabatan')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="ig" class="form-label">ig</label>
                                  <input type="text" class="form-control @error('ig') is-invalid"@enderror id="ig" name="ig" >
                                  @error('ig')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="linkedin" class="form-label">linkedin</label>
                                  <input type="text" class="form-control @error('linkedin') is-invalid"@enderror id="linkedin" name="linkedin" >
                                  @error('linkedin')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Tambah team</button>
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
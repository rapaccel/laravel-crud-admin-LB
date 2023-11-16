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
                                <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                                  @csrf
                              
                                  <div class="mb-3">
                                    <label for="judul" class="form-label">judul</label>
                                    <input type="text" value="{{ old('judul') }}"  class="form-control @error('judul')
                                    is-invalid
                                    @enderror " id="judul" name="judul" >
                                    @error('judul')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                          @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="thumbnail" class="form-label">thumbnail</label>
                              
                                    <input type="file" class="form-control @error('thumbnail') is-invalid"@enderror id="thumbnail" name="thumbnail" >
                                    @error('thumbnail')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                          @enderror
                                  </div>
                                
                                  <div class="mb-3">
                                    <label for="isi" class="form-label">isi</label>
                                    <input id="isi" value="{{ old('isi') }}" class=" @error('isi') is-invalid @enderror"type="hidden" name="isi">
                                  <trix-editor input="isi"></trix-editor>
                                  @error('isi')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                          @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="tag" class="form-label">tag</label>
                                    <input type="text" value="{{ old('tag') }}" class="form-control @error('tag') is-invalid"@enderror id="tag" name="tag" >
                                    @error('tag')
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                          @enderror
                                  </div>
                                  <div class="mb-3">
                                    <label for="Kategori" class="form-label">Kategori</label>
                                    <select class="form-control " name="kategori_id">
                                      @foreach ($kategori as $kategori)
                            
                                      <option value="{{ $kategori->id }}">{{ $kategori->namaKategori }}</option>
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
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
                    

                    
                                <form action="{{ route('portofolios.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="judul">Judul:</label>
                                        <input type="text" name="judul" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fitur" class="form-label">fitur</label>
                                        <input id="fitur" class=" @error('fitur') is-invalid @enderror"type="hidden" name="fitur" required >
                                        <trix-editor input="fitur"></trix-editor>
                                        @error('fitur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi:</label>
                                            <input id="deskripsi" name="deskripsi" class="form-control" rows="5" type="hidden" required  >
                                            <trix-editor input="deskripsi"></trix-editor>
                                            @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    <div class="form-group">
                                        <label for="gambar1">Gambar 1:</label>
                                        <input type="file" name="gambar1" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar2">Gambar 2:</label>
                                        <input type="file" name="gambar2" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar3">Gambar 3:</label>
                                        <input type="file" name="gambar3" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar4">Gambar 4:</label>
                                        <input type="file" name="gambar4" class="form-control-file">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                
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
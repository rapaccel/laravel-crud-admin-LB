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
                    

                    
                                    <form action="{{ route('portofolios.update',$portofolio->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="judul">Judul:</label>
                                            <input type="text" name="judul" class="form-control" value="{{ old("judul",$portofolio->judul) }}" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="fitur" class="form-label">fitur</label>
                                        <input id="fitur" class=" @error('fitur') is-invalid @enderror"type="hidden" name="fitur" value="{{ $portofolio->fitur }}">
                                        <trix-editor input="fitur"></trix-editor>
                                        @error('fitur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi:</label>
                                            <input id="deskripsi" name="deskripsi" class="form-control" rows="5" type="hidden" required value="{{ $portofolio->deskripsi }}" >
                                            <trix-editor input="deskripsi"></trix-editor>
                                            @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar1">Gambar 1:</label>
                                            <input type="file" name="gambar1" class="form-control-file" id="gambar1" onchange="previewImage('gambar1', 'preview1')">
                                            <img id="preview1" src="{{ asset('storage/' . $portofolio->gambar1) }}" alt="Preview Gambar 1" style="max-width: 200px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar2">Gambar 2:</label>
                                            <input type="file" name="gambar2" class="form-control-file" id="gambar2" onchange="previewImage('gambar2', 'preview2')">
                                            <img id="preview2" src="{{ asset('storage/' . $portofolio->gambar2) }}" alt="Preview Gambar 1" style="max-width: 200px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar3">Gambar 3:</label>
                                            <input type="file" name="gambar3" class="form-control-file" id="gambar3" onchange="previewImage('gambar3', 'preview3')">
                                            <img id="preview3" src="{{ asset('storage/' . $portofolio->gambar3) }}" alt="Preview Gambar 1" style="max-width: 200px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar4">Gambar 4:</label>
                                            <input type="file" name="gambar4" class="form-control-file" id="gambar4" onchange="previewImage('gambar4', 'preview4')">
                                            <img id="preview4" src="{{ asset('storage/' . $portofolio->gambar4) }}" alt="Preview Gambar 1" style="max-width: 200px;">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                
                            </div>


                        </div>
                    </div>
                </div>
         </div>
        </div>

<script>
    function previewImage(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
        }
    }
</script>
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
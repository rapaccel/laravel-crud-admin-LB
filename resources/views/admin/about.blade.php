@include('layouts.main')

<body>

    @include('partials.header')

    <link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote.css')}}">
    <script></script>
  
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
                        
                                    <button id="myButton">Klik Saya</button>
                                    <script>
                                        var button = document.getElementById("myButton");
                                        button.addEventListener("click", function() {
                                          alert("Tombol diklik!");
                                        });
                                      </script>
                                    <form method="post" action="{{ route('abouts.update',1) }}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        
                                        <label for="tentang" class="form-label">tentang</label>
                                        <textarea id="summernote" class=" @error('tentang') is-invalid @enderror"type="hidden" name="tentang">
                                        {{ old('tentang',$about->tentang) }}</textarea>
                                        @error('tentang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        
                                        <label for="nohp" class="form-label">nohp</label>
                                        <input type="text"  class="form-control @error('nohp') is-invalid"@enderror id="nohp" name="nohp" value="{!! old('nohp',$about->nohp) !!}">
                                        @error('nohp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                        <label for="nohp" class="form-label">Email</label>  
                                        <input type="text" class="form-control @error('email') is-invalid"@enderror id="email" name="email"  value="{{ $about->email }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea   class="form-control @error('alamat') is-invalid"@enderror id="alamat" name="alamat" >{{ $about->alamat }}</textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        
                                        <div class="mb-3">
                                        <label for="ig" class="form-label">ig</label>
                                        <input type="text" name="ig" class="form-control @error('ig') is-invalid"@enderror id="ig" value="{{ $about->ig }}">
                                        @error('ig')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update About</button>

                                    
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
    <script src="{{asset('assets/vendor/summernote/js/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote()
        })
    </script>
    <script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>
    <!--**********************************
        Scripts
    ***********************************-->
    

</body>

</html>
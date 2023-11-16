@include('layouts.main')

<body>

    @include('partials.header')
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
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Tambah team Baru</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px; text-align: center;">
                                        <thead>
                                            <tr >
                                                <th>Nama</th>
                                                <th>Foto</th>
                                                <th>Jabatan</th>
                                                <th>Instagram</th>
                                                <th>Linkedin</th>  
                                                <th>Aksi</th>                                    
                                            </tr>
                                        </thead>
                              
                                    <tbody>
                                        @foreach ($teams as $team)                                   
                                        <tr>
                                        <td>
                                            {{ $team->nama }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/' . $team->foto) }}" style="max-width: 150px; 
                                            max-height: 150px;" alt="foto">
                                        </td>
                                        <td>
                                            {!! $team->jabatan !!}
                                        </td>
                                        <td>
                                            {{ $team->ig }} 
                                        </td>
                                        <td>
                                            {{ $team->linkedin }}
                                        </td>
                                        <td class="padding-2"style="display: flex; justify-content: center; align-items: center;">
                                        <a href="#" ><i class="fa fa-eye btn bg-success"style="color: #ffffff; "></i></a>
                                        <a href="{{ route('teams.edit',$team->id) }}" class="btn bg-warning"><i class="fa fa-pencil-square-o" style="color: #ffffff;"></i></a>
                                        <form action="{{ route('teams.destroy',$team->id) }}" method="POST" class="d-inline" data-form="{{ $team->id }}">
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
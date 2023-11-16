@include('main')

<body>
    <script src="assets/static/js/initTheme.js"></script>

    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                  <i class="bi bi-justify fs-3"></i>
                </a>
              </header>
            <div class="page-content">
                <h6>TOTAL PENGAJUAN</h6>
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon mb-4" style="background-color:darkgreen">
                                                    <i class="bi bi-postcard mb-2 me-2"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Kartu Keluarga</h6>
                                               
                                                @if ($statuskk == 'success')
                                                <h6 class="font-extrabold mb-0">{{ $kk }}</h6>
                                                @else
                                                <h6 class="font-extrabold mb-0">0</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="bi bi-file-text-fill mb-2 me-2"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Akta Kelahiran</h6>
                                               
                                                @if ($statusakta == 'success')
                                                <h6 class="font-extrabold mb-0">{{ $data1 }}</h6>
                                                @else
                                                <h6 class="font-extrabold mb-0">0</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2">
                                                    <i class="bi bi-person-video2 mb-2 me-2"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">KIA</h6>
                                                @if ($statuskia == 'success')
                                                <h6 class="font-extrabold mb-0">{{ $kia }}</h6>
                                                @else
                                                <h6 class="font-extrabold mb-0">0</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <i class="bi bi-person-vcard mb-2 me-2"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">E-KTP</h6>
                                                @if ($statusktp == 'success')
                                                <h6 class="font-extrabold mb-0">{{ $ktp }}</h6>
                                                @else
                                                <h6 class="font-extrabold mb-0">0</h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </section>
            </div>


        </div>
    </div>
    @include('partials.footer')
    </div>

    @include('partials.script')

</body>

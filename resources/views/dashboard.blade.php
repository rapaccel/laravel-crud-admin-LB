@include('layouts.main')

<body>

    @include('partials.header')
    @include('partials.sidebar')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row ">
                    
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa fa-file-text text-primary border-primary"></i>
                                    
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Blog</div>
                                    <div class="stat-digit">{{ $blogCount }}</div>
                                    <a href="{{ route('blogs.index') }}" style="color: dodgerblue">Lihat Blog >></a>
                                        
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa fa-users text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Team</div>
                                    <div class="stat-digit">{{ $teamCount }}</div>
                                    <a href="{{ route('teams.index') }}" style="color: dodgerblue">Lihat Team >></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa fa-file-text text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Blog</div>
                                    <div class="stat-digit">{{ $teamCount }}</div>
                                    <a href="{{ route('blogs.index') }}" style="color: dodgerblue">Lihat Blog >></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa fa-code text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Fitur</div>
                                    <div class="stat-digit">{{ $teamCount }}</div>
                                    <a href="{{ route('fiturs.index') }}" style="color: dodgerblue">Lihat Fitur >></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="fa fa-file-code-o text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Service</div>
                                    <div class="stat-digit">{{ $teamCount }}</div>
                                    <div class="stat-text"> <a href=""></a></div>
                                    <a href="{{ route('services.index') }}" style="color: dodgerblue">Lihat service >></a>
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
    <!--**********************************
        Scripts
    ***********************************-->
    

</body>

</html>
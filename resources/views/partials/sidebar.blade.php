<!--**********************************
            Sidebar start
        ***********************************-->
<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a href="/"><i class="fa fa-home"></i><span class="nav-text">Dashboard</span></a>
            </li>
            <li class="nav-label">Pengaturan Dasar</li>
            <li>
                <a  href="{{ route('abouts.edit',1) }}" ><i
                    class="fa fa-info-circle"></i><span class="nav-text">Pengaturan About</span></a>
            </li>
            <li>
                <a  href="{{ route('portofolios.index') }}" ><i
                    class="fa fa-address-card"></i><span class="nav-text">Portofolio</span></a>
            </li>
            <li>
                <a  href="{{ route("teams.index") }}" ><i
                    class="fa fa-users"></i><span class="nav-text">Team</span></a>
            </li>
           
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                class="fa fa-file-text"></i><span class="nav-text">Blog</span></a>
            <ul aria-expanded="false">
                
                <li>
                    <a  href="{{ route('blogs.index') }}" >Pengaturan Blog</a>
                </li>
                <li>
                    <a  href="{{ route('kategoris.index') }}" >Kategori</span></a>
                </li>
            </ul>
        </li>
            {{-- <li>
                <a  href="{{ route("fiturs.index") }}" ><i
                    class="fa fa-file-code-o"></i><span class="nav-text">Fitur</span></a>
            </li>
            
            <li>
                <a  href="{{ route("prices.index") }}" ><i
                    class="fa fa-dollar"></i><span class="nav-text">Price</span></a>
            </li> --}}
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                class="fa fa-file-code-o"></i><span class="nav-text">Service</span></a>
            <ul aria-expanded="false">
                <li> <a  href="{{ route("fiturs.index") }}" >Fitur</a></li>
                <li>  <a  href="{{ route("prices.index") }}" >Price</a></li>
                <li>  <a  href="{{ route("services.index") }}" >Service</a></li>
                <li>  <a  href="{{ route("ungguls.index") }}" >Keunggulan</a></li>
               
            </ul>
        </li>

            
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->

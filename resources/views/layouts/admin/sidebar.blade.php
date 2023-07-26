<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('admin/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Admin
                            <span class="user-level">admin@gmail.com</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('admin/symptoms*') ? 'active' : '' }}">
                    <a href="{{ route('symptoms.index') }}">
                        <i class="fas fa-share-alt"></i>
                        <p>Gejala</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('admin/diseases*') ? 'active' : '' }}">
                    <a href="{{ route('diseases.index') }}">
                        <i class="fas fa-bug"></i>
                        <p>Penyakit</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('admin/knowledge_bases*') ? 'active' : '' }}">
                    <a href="{{ route('knowledge_bases.index') }}">
                        <i class="fas fa-book"></i>
                        <p>Basis Pengetahuan</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('admin/diagnoses*') ? 'active' : '' }}">
                    <a href="{{ route('diagnoses.index') }}">
                        <i class="fas fa-diagnoses"></i>
                        <p>Diagnosis</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->

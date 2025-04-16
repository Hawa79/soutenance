<div class="sidebar-nav scrollbar scroll_light">
    <div class="d-flex align-items-center text-left px-2 mb-2 user-setting">
        <div class="position-relative">
            <div class="avatar">
                <img class="avatar-img rounded-circle" src="{{asset('admin/assets/img/avatar/02.jpg')}}" alt="avatar-img">
                <span class="bg-success user-status"></span>
            </div>
        </div>
        <div class="ml-2">
            <h6 class="mb-0 text-white">{{ Auth::guard('agence')->user()->nom}} {{ Auth::guard('agence')->user()->prenom}}</h6>
            <small class="d-block text-white">Agence</small>
        </div>
        <div class="ml-auto user-setting">
            <a href="#"> <i class="fe fe-settings"></i> </a>
        </div>
    </div>
    <ul class="metismenu" id="sidebarNav">
        <li class="active">
            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                <i class="nav-icon ti ti-rocket"></i>
                <span class="nav-title">Tableau de bord</span>
            </a>
        </li>
        <li><a href="#" aria-expanded="false"><i class="nav-icon ti ti-layout-column3-alt"></i><span class="nav-title">Proprietes</span></a> </li>
        <li><a href="" aria-expanded="false"><i class="nav-icon ti ti-user"></i><span class="nav-title">Profile</span></a> </li>
    </ul>
</div>

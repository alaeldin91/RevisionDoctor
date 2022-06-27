
@php $locale = session()->get('locale'); @endphp
<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                
                <div class="header-search">
                    <div class="input-group">

                        <span class="input-group-addon search-close">
                            <i class="ik ik-x"></i>
                        </span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                    </div>
                </div>
                <button class="nav-link" title="clear cache">
                    <a  href="{{url('clear-cache')}}">
                    <i class="ik ik-battery-charging"></i> 
                </a>
                </button> &nbsp;&nbsp;
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">

            <div class="dropdown">
    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="ik ik-grid"></i>
        @switch($locale)
            @case('en')
          
            @break
            @case('ar')
             arabic
            @break
           
        @endswitch
       
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="language/en">English</a>
        <a class="dropdown-item" href="language/ar">Arabic</a>
    </div>

</div>
<div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notiDropdown"
					role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown" 
					aria-labelledby="notiDropdown">
                        <h4 class="header">{{trans('dashboard.Notification')}}</h4>
                        <div class="notifications-wrap">
                            
                        </div>
                        <div class="footer"><a href="javascript:void(0);">{{ __('See all activity')}}</a></div>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-plus"></i></a>
                    <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.dash')}}"><i class="ik ik-bar-chart-2"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.patient')}}"><i class="ik ik-users"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.doctor')}}"><i class="ik ik-briefcase"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.lab')}}"><i class="ik ik-clipboard"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.surgeries')}}"><i class="ik ik-message-square"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.medical_pro')}}"><i class="ik ik-inbox"></i></a>
                       
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.admin_pro')}}"><i class="ik ik-calendar"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.country')}}"><i class="ik ik-map-pin"></i></a>

                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.pharmacy')}}"><i class="ik ik-more-horizontal"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.report')}}"><i class="ik ik-calendar"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.Permission')}}"><i class="ik ik-briefcase"></i></a>
                        <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top" title="{{__('dashboard.employee')}}"><i class="ik ik-users"></i></a>

                    </div>
                </div>
             
               
             
                <div>
               
               
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{ asset('img/user.jpg')}}" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{url('profile')}}"><i class="ik ik-user dropdown-icon"></i> {{ __('Profile')}}</a>
                        <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i> {{ __('Language')}}</a>
                        <a class="dropdown-item" href="{{ url('logout') }}">
                            <i class="ik ik-power dropdown-icon"></i> 
                            {{ __('Logout')}}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
               <img height="90"  width="210"src="{{ asset('img/AboHanna.png')}}" class="header-brand-img" title="RADMIN"> 
            </div>
        </a>
       
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}">
                        <i class="ik ik-bar-chart-2"></i><span>{{ __('Dashboard')}}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' ||
                     $segment1 == 'roles'||$segment1 == 'permission'
                      ||$segment1 == 'user') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-user"></i><span>{{ __('Adminstrator')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        
                        <a href="{{url('users')}}" class="menu-item {{ ($segment1 == 'users') ? 'active' : '' }}">{{ __('Users')}}</a>
                        <a href="{{url('user/create')}}" class="menu-item {{ ($segment1 == 'user' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Add User')}}</a>
                       
                         <!-- only those have manage_role permission will get access -->
                       
                        <a href="{{url('roles')}}" class="menu-item {{ ($segment1 == 'roles') ? 'active' : '' }}">{{ __('Roles')}}</a>
                        
                        <!-- only those have manage_permission permission will get access -->
                       
                        <a href="{{url('permission')}}" class="menu-item {{ ($segment1 == 'permission') ? 'active' : '' }}">{{ __('Permission')}}</a>
                      
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'state' ||
                     $segment1 == 'area'
                     ) ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-map-pin"></i><span>{{ __('Manage State')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                        <a href="{{url('state')}}" class="menu-item {{ ($segment1 == 'state') ? 'active' : '' }}">{{ __('State')}}</a>
                         <!-- only those have manage_role permission will get access -->
                        <a href="{{url('area')}}" class="menu-item {{ ($segment1 == 'area') ? 'active' : '' }}">{{ __('Area')}}</a>
                        <!-- only those have manage_permission permission will get access -->
                     
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'Unit' ||
                     $segment1 == 'Jobs'||$segment1=='AddJobs'
                     ||$segment1=='Qualifaction'||$segment1=='degree'||
                     $segment1=='Currency'||$segment1=='experience'||$segment1=='language'||$segment1=='salary'||$segment1=='employment'
                     ) ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-users"></i><span>{{ __('Manage HR')}}</span></a>
                    <div class="submenu-content">
                        <!-- only those have manage_user permission will get access -->
                      
                        <a href="{{url('addunit')}}" class="menu-item {{ ($segment1 == 'Unit') ? 'active' : '' }}">{{ __('Unit')}}</a>
                        
                        <a href="{{url('jobs')}}" class="menu-item {{ ($segment1 == 'Jobs') ? 'active' : '' }}">{{ __('  Jobs')}}</a>
                       
                        <a href="{{url('addjob')}}" class="menu-item {{ ($segment1 == 'AddJobs') ? 'active' : '' }}">{{ __(' Add Jobs')}}</a>
                    
                        <a href="{{url('qulification')}}" class="menu-item {{ ($segment1 == 'Qualification') ? 'active' : '' }}">{{ __('Qualification')}}</a>
                      
                        <a href="{{url('degree')}}" class="menu-item {{ ($segment1 == 'degree') ? 'active' : '' }}">{{ __('Degree')}}</a>
                      
                        <a href="{{url('currency')}}" class="menu-item {{ ($segment1 == 'Currency') ? 'active' : '' }}">{{ __('Currency')}}</a>
                    
                        <a href="{{url('experience')}}" class="menu-item {{ ($segment1 == 'experience') ? 'active' : '' }}">{{ __('Experience')}}</a>
                       
                        <a href="{{url('language')}}" class="menu-item {{ ($segment1 == 'language') ? 'active' : '' }}">{{ __('Language')}}</a>
                      
                        <a href="{{url('salary')}}" class="menu-item {{ ($segment1 == 'salary') ? 'active' : '' }}">{{ __('Salary')}}</a>
                      
                        <a href="{{url('employment')}}" class="menu-item {{ ($segment1 == 'employment') ? 'active' : '' }}">{{ __('Employment')}}</a>
                       
                    </div>
                   </div>
                 </nav>
               </div>
             </div>
            </div>
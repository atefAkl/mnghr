<div class="main-sidebar flex-shrink-0" style="background-color: #292421">
    <a href="/" class="sidebar-brand d-flex align-items-center">
        <img src="{{ asset('assets/admin/uploads/images/ayerp.logo.png') }}" width="30" height="30">
        <span class="fs-5 fw-semibold">{{__('layout.hr-app-home')}}</span>
    </a>
    <ul class="list-unstyled ps-0" id="sidebarAccordion">


        <!-- لوحة التحكم -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/dashboard*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#dashboard-collapse"
                aria-expanded="{{ Request::is('admin/dashboard*') ? 'true' : 'false' }}">
                <i class="fas fa-tachometer-alt"></i> &nbsp; {{__('layout.dashboard')}}
            </button>
            <div class="collapse {{ Request::is('admin/dashboard*') ? 'show' : '' }}" id="dashboard-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/dashboard/home"
                            class="rounded {{ Request::is('admin/dashboard/home') ? 'active' : '' }}">
                            <i class="fas fa-home"></i> &nbsp; {{__('layout.home')}}
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/reports"
                            class="rounded {{ Request::is('admin/dashboard/reports') ? 'active' : '' }}">
                            <i class="fas fa-chart-line"></i> &nbsp; {{__('layout.reports')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard-settings-home') }}"
                            class="rounded {{ Request::is('dashboard-settings-home') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> &nbsp; {{__('layout.settings')}}
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- المستخدمين -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/users*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#users-collapse"
                aria-expanded="{{ Request::is('admin/users*') ? 'true' : 'false' }}">
                <i class="fas fa-user-shield"></i> &nbsp; {{__('layout.admins')}}
            </button>
            <div class="collapse {{ Request::is('admin/users*') ? 'show' : '' }}" id="users-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/admins/all"
                            class="rounded {{ Request::is('admin/users/list') ? 'active' : '' }}">
                            <i class="fas fa-users"></i> &nbsp; {{__('layout.admins-list')}}
                        </a>
                    </li>
                    <li>
                        <a href="/admin/roles/all"
                            class="rounded {{ Request::is('admin/users/roles') ? 'active' : '' }}">
                            <i class="fas fa-user-tag"></i> &nbsp; {{__('layout.roles-list')}}
                        </a>
                    </li>
                    <li>
                        <a href="/admin/permissions/all"
                            class="rounded {{ Request::is('admin/users/roles') ? 'active' : '' }}">
                            <i class="fas fa-user-tag"></i> &nbsp; {{__('layout.permissions')}}
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- ادارة الموارد البشرية -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/employees*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#dinance-collapse"
                aria-expanded="{{ Request::is('admin/employees*') ? 'true' : 'false' }}">
                <i class="fas fa-user-cog"></i> &nbsp; {{__('layout.hr')}}
            </button>
            <div class="collapse {{ Request::is('admin/employees*') ? 'show' : '' }}" id="dinance-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="{{ route('display-employees-list') }}"
                            class="rounded {{ Request::is('admin/employees/list') ? 'active' : '' }}">
                            <i class="fas fa-id-card"></i> &nbsp; {{__('layout.employees-list')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('display-salaries-groups') }}"
                            class="rounded {{ Request::is('admin/salaries/groups') ? 'active' : '' }}">
                            <i class="fas fa-id-card"></i> &nbsp; {{__('layout.salaries')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('display-vaccations-types') }}"
                            class="rounded {{ Request::is('admin/vaccations/types') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> &nbsp; {{__('layout.vaccations')}}
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('display-departments-list') }}"
                            class="rounded {{ Request::is('admin/departments/list') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> &nbsp; {{__('layout.departments')}}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('display-jobtitles-list') }}"
                            class="rounded {{ Request::is('admin/job-titles/list') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> &nbsp; {{__('layout.job-titles')}}
                        </a>
                    </li>
                    
                </ul>
            </div>
        </li>


        <!-- الحساب -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/account*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#account-collapse"
                aria-expanded="{{ Request::is('admin/account*') ? 'true' : 'false' }}">
                <i class="fas fa-user-circle"></i> &nbsp; {{__('layout.account')}}
            </button>
            <div class="collapse {{ Request::is('admin/account*') ? 'show' : '' }}" id="account-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/account/profile"
                            class="rounded {{ Request::is('admin/account/profile') ? 'active' : '' }}">
                            <i class="fas fa-id-card"></i> &nbsp; {{__('layout.profile')}}
                        </a>
                    </li>
                    <li>
                        <a href="/admin/account/settings"
                            class="rounded {{ Request::is('admin/account/settings') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> &nbsp; {{__('layout.settings')}}
                        </a>
                    </li>
                    <li>
                        <a href="/admin/logout" class="rounded">
                            <i class="fas fa-sign-out-alt"></i> &nbsp; {{__('layout.log-out')}}
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</div>

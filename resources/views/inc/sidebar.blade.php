<div class="main-sidebar flex-shrink-0">
    <a href="/" class="sidebar-brand d-flex align-items-center">
        <img src="{{ asset('assets/admin/uploads/images/ayerp.logo.png') }}" width="30" height="30">
        <span class="fs-5 fw-semibold">AYERP Home</span>
    </a>
    <ul class="list-unstyled ps-0" id="sidebarAccordion">
        <!-- المخازن -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/stores/*') || Request::is('admin/items/*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#stores-collapse"
                aria-expanded="{{ Request::is('admin/stores*') || Request::is('admin/items*') ? 'true' : 'false' }}">
                <i class="fas fa-warehouse"></i> &nbsp; Stores
            </button>
            <div class="collapse {{ Request::is('admin/stores*') || Request::is('admin/items*') ? 'show' : '' }}" id="stores-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/stores/home"
                            class="rounded {{ Request::is('admin/stores/home') ? 'active' : '' }}">
                            <i class="fas fa-chart-pie"></i> &nbsp; Home
                        </a>
                    </li>
                    <li>
                        <a href="/admin/items/home"
                            class="rounded {{ Request::is('admin/items/*') ? 'active' : '' }}">
                            <i class="fas fa-boxes"></i> &nbsp; Items
                        </a>
                    </li>
                    <li>
                        <a href="{{route('store-reports')}}"
                            class="rounded {{ Request::is('admin/stores/reports/*') ? 'active' : '' }}">
                            <i class="fas fa-tags"></i> &nbsp; Reports
                        </a>
                    </li>
                    <li>
                        <a href="{{route('store-settings')}}"
                            class="rounded {{ Request::is('admin/stores/settings/*') ? 'active' : '' }}">
                            <i class="fas fa-weight-hanging"></i> &nbsp; Settings
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- المشتريات -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/purchases*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#purchases-collapse"
                aria-expanded="{{ Request::is('admin/purchases*') ? 'true' : 'false' }}">
                <i class="fas fa-shopping-cart"></i> &nbsp; Purchases
            </button>
            <div class="collapse {{ Request::is('admin/purchases*') ? 'show' : '' }}" id="purchases-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/purchases/home"
                            class="rounded {{ Request::is('admin/purchases/home') ? 'active' : '' }}">
                            <i class="fas fa-chart-line"></i> &nbsp; Statistics
                        </a>
                    </li>
                    <li>
                        <a href="/admin/purchases/orders"
                            class="rounded {{ Request::is('admin/purchases/orders') ? 'active' : '' }}">
                            <i class="fas fa-file-invoice"></i> &nbsp; Purchase Orders
                        </a>
                    </li>
                    <li>
                        <a href="/admin/purchases/returns"
                            class="rounded {{ Request::is('admin/purchases/returns') ? 'active' : '' }}">
                            <i class="fas fa-undo"></i> &nbsp; Returns
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- المبيعات -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/sales*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#sales-collapse"
                aria-expanded="{{ Request::is('admin/sales*') ? 'true' : 'false' }}">
                <i class="fas fa-cash-register"></i> &nbsp; Sales
            </button>
            <div class="collapse {{ Request::is('admin/sales*') ? 'show' : '' }}" id="sales-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/sales/home"
                            class="rounded {{ Request::is('admin/sales/home') ? 'active' : '' }}">
                            <i class="fas fa-chart-bar"></i> &nbsp; Statistics
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sales/orders"
                            class="rounded {{ Request::is('admin/sales/orders') ? 'active' : '' }}">
                            <i class="fas fa-receipt"></i> &nbsp; Invoices
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sales/returns"
                            class="rounded {{ Request::is('admin/sales/returns') ? 'active' : '' }}">
                            <i class="fas fa-undo-alt"></i> &nbsp; Returns
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- العملاء -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/customers*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#customers-collapse"
                aria-expanded="{{ Request::is('admin/customers*') ? 'true' : 'false' }}">
                <i class="fas fa-users"></i> &nbsp; Customers
            </button>
            <div class="collapse {{ Request::is('admin/customers*') ? 'show' : '' }}" id="customers-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/customers/list"
                            class="rounded {{ Request::is('admin/customers/list') ? 'active' : '' }}">
                            <i class="fas fa-list"></i> &nbsp; Customer List
                        </a>
                    </li>
                    <li>
                        <a href="/admin/customers/accounts"
                            class="rounded {{ Request::is('admin/customers/accounts') ? 'active' : '' }}">
                            <i class="fas fa-file-invoice-dollar"></i> &nbsp; Accounts
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- الموردين -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/suppliers*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#suppliers-collapse"
                aria-expanded="{{ Request::is('admin/suppliers*') ? 'true' : 'false' }}">
                <i class="fas fa-truck"></i> &nbsp; Suppliers
            </button>
            <div class="collapse {{ Request::is('admin/suppliers*') ? 'show' : '' }}" id="suppliers-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/suppliers/list"
                            class="rounded {{ Request::is('admin/suppliers/list') ? 'active' : '' }}">
                            <i class="fas fa-list"></i> &nbsp; Supplier List
                        </a>
                    </li>
                    <li>
                        <a href="/admin/suppliers/accounts"
                            class="rounded {{ Request::is('admin/suppliers/accounts') ? 'active' : '' }}">
                            <i class="fas fa-file-invoice-dollar"></i> &nbsp; Accounts
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- لوحة التحكم -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/dashboard*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#dashboard-collapse"
                aria-expanded="{{ Request::is('admin/dashboard*') ? 'true' : 'false' }}">
                <i class="fas fa-tachometer-alt"></i> &nbsp; Dashboard
            </button>
            <div class="collapse {{ Request::is('admin/dashboard*') ? 'show' : '' }}" id="dashboard-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/dashboard/home"
                            class="rounded {{ Request::is('admin/dashboard/home') ? 'active' : '' }}">
                            <i class="fas fa-home"></i> &nbsp; Home
                        </a>
                    </li>
                    <li>
                        <a href="/admin/dashboard/reports"
                            class="rounded {{ Request::is('admin/dashboard/reports') ? 'active' : '' }}">
                            <i class="fas fa-chart-line"></i> &nbsp; Reports
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard-settings-home') }}"
                            class="rounded {{ Request::is('dashboard-settings-home') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> &nbsp; Settings
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
                <i class="fas fa-user-shield"></i> &nbsp; Users
            </button>
            <div class="collapse {{ Request::is('admin/users*') ? 'show' : '' }}" id="users-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/admins/all"
                            class="rounded {{ Request::is('admin/users/list') ? 'active' : '' }}">
                            <i class="fas fa-users"></i> &nbsp; Admins List
                        </a>
                    </li>
                    <li>
                        <a href="/admin/roles/all"
                            class="rounded {{ Request::is('admin/users/roles') ? 'active' : '' }}">
                            <i class="fas fa-user-tag"></i> &nbsp; Roles
                        </a>
                    </li>
                    <li>
                        <a href="/admin/permissions/all"
                            class="rounded {{ Request::is('admin/users/roles') ? 'active' : '' }}">
                            <i class="fas fa-user-tag"></i> &nbsp; Permissions
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
                <i class="fas fa-user-circle"></i> &nbsp; Account
            </button>
            <div class="collapse {{ Request::is('admin/account*') ? 'show' : '' }}" id="account-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/account/profile"
                            class="rounded {{ Request::is('admin/account/profile') ? 'active' : '' }}">
                            <i class="fas fa-id-card"></i> &nbsp; Profile
                        </a>
                    </li>
                    <li>
                        <a href="/admin/account/settings"
                            class="rounded {{ Request::is('admin/account/settings') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> &nbsp; Settings
                        </a>
                    </li>
                    <li>
                        <a href="/admin/logout" class="rounded">
                            <i class="fas fa-sign-out-alt"></i> &nbsp; Logout
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <!-- الادارة المالية -->
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center {{ Request::is('admin/account*') ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" data-bs-target="#dinance-collapse"
                aria-expanded="{{ Request::is('admin/account*') ? 'true' : 'false' }}">
                <i class="fas fa-user-circle"></i> &nbsp; Financials
            </button>
            <div class="collapse {{ Request::is('admin/account*') ? 'show' : '' }}" id="dinance-collapse"
                data-bs-parent="#sidebarAccordion">
                <ul class="btn-toggle-nav list-unstyled fw-normal small">
                    <li>
                        <a href="/admin/account/profile"
                            class="rounded {{ Request::is('admin/account/profile') ? 'active' : '' }}">
                            <i class="fas fa-id-card"></i> &nbsp; Wallets
                        </a>
                    </li>
                    <li>
                        <a href="/admin/account/profile"
                            class="rounded {{ Request::is('admin/account/profile') ? 'active' : '' }}">
                            <i class="fas fa-id-card"></i> &nbsp; Receipts
                        </a>
                    </li>
                    <li>
                        <a href="/admin/account/settings"
                            class="rounded {{ Request::is('admin/account/settings') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> &nbsp; Settings
                        </a>
                    </li>
                    <li>
                        <a href="/admin/logout" class="rounded">
                            <i class="fas fa-sign-out-alt"></i> &nbsp; Logout
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>

<style>
.sidebar {
    background-color: #fff;
    border-right: 1px solid #e5e5e5;
    padding: 1rem;
    height: 100vh;
    width: 280px;
}

.sidebar-section {
    margin-bottom: 2rem;
}

.sidebar-section h3 {
    color: #1c1e21;
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.sidebar-link {
    display: flex;
    align-items: center;
    padding: 0.5rem;
    color: #1c1e21;
    text-decoration: none;
    border-radius: 6px;
    margin-bottom: 0.25rem;
}

.sidebar-link:hover {
    background-color: #f0f2f5;
}

.sidebar-link.active {
    background-color: #e6f2fe;
    color: #0866ff;
}

.sidebar-link i {
    width: 24px;
    margin-right: 0.75rem;
    font-size: 1.1rem;
}

.sidebar-link span {
    flex-grow: 1;
}

.sidebar-link .badge {
    background-color: #e4e6eb;
    color: #1c1e21;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.75rem;
}
</style>

<div class="sidebar">
    <!-- Store Management -->
    <div class="sidebar-section">
        <h3>Store Management</h3>
        <a href="/admin/stores/home" class="sidebar-link {{ Request::is('admin/stores/home') ? 'active' : '' }}">
            <i class="fas fa-store"></i>
            <span>Stores</span>
        </a>
        <a href="/admin/stores/receipts" class="sidebar-link {{ Request::is('admin/stores/receipts') ? 'active' : '' }}">
            <i class="fas fa-receipt"></i>
            <span>Receipts</span>
        </a>
        <a href="/admin/stores/entries" class="sidebar-link {{ Request::is('admin/stores/entries') ? 'active' : '' }}">
            <i class="fas fa-boxes"></i>
            <span>Entries</span>
        </a>
    </div>

    <!-- Products Management -->
    <div class="sidebar-section">
        <h3>Products Management</h3>
        <a href="/admin/items" class="sidebar-link {{ Request::is('admin/items') ? 'active' : '' }}">
            <i class="fas fa-box"></i>
            <span>Products</span>
        </a>
        <a href="/admin/items/categories" class="sidebar-link {{ Request::is('admin/items/categories') ? 'active' : '' }}">
            <i class="fas fa-tags"></i>
            <span>Categories</span>
        </a>
        <a href="/admin/items/units" class="sidebar-link {{ Request::is('admin/items/units') ? 'active' : '' }}">
            <i class="fas fa-balance-scale"></i>
            <span>Units</span>
        </a>
    </div>

    <!-- Users Management -->
    <div class="sidebar-section">
        <h3>Users Management</h3>
        <a href="/admin/users" class="sidebar-link {{ Request::is('admin/users') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
        <a href="/admin/users/roles" class="sidebar-link {{ Request::is('admin/users/roles') ? 'active' : '' }}">
            <i class="fas fa-user-tag"></i>
            <span>Roles</span>
        </a>
        <a href="/admin/users/permissions" class="sidebar-link {{ Request::is('admin/users/permissions') ? 'active' : '' }}">
            <i class="fas fa-key"></i>
            <span>Permissions</span>
        </a>
    </div>

    <!-- Settings -->
    <div class="sidebar-section">
        <h3>Settings</h3>
        <a href="/admin/settings" class="sidebar-link {{ Request::is('admin/settings') ? 'active' : '' }}">
            <i class="fas fa-cog"></i>
            <span>General Settings</span>
        </a>
        <a href="/admin/settings/backup" class="sidebar-link {{ Request::is('admin/settings/backup') ? 'active' : '' }}">
            <i class="fas fa-database"></i>
            <span>Backup</span>
        </a>
    </div>
</div>

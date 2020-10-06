<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
@if (Request::is('admin*'))


           {{-- <li class="nav-item has-treeview menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Starter Pages
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Active Page</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inactive Page</p>
            </a>
          </li>
        </ul>
      </li> --}}
      <li class="{{ Request::is('admin/dashboard') ? 'active' : ''}}">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="fas fa-tachometer-alt text-blue"></i>
          <p>
            Dashboard
            {{-- <span class="right badge badge-danger">New</span> --}}
          </p>
        </a>
      </li>
      <li class="{{ Request::is('admin/order') ? 'active' : ''}}">
        <a href="{{ route('admin.order.index') }}" class="nav-link">
            <i class="fas fa-tachometer-alt text-blue"></i>
          <p>
            Orders
            {{-- <span class="right badge badge-danger">New</span> --}}
          </p>
        </a>
      </li>
      <li class="{{ Request::is('admin/slider*') ? 'active' : ''}}">
        <a href="{{ route('admin.slider.index') }}" class="nav-link">
            <i class="fas fa-table text-info"></i>
          <p>
            Slider
          </p>
        </a>
      </li>
      <li class="{{ Request::is('admin/category*') ? 'active' : ''}}">
        <a href="{{ route('admin.category.index') }}" class="nav-link">
            <i class="fas fa-table text-info"></i>
          <p>
            Categories
          </p>
        </a>
      </li>

      <li class="{{ Request::is('admin/brand*')? 'active' : ''}}">
        <a href="{{ route('admin.brand.index') }}" class="nav-link">
            <i class="fas fa-table text-info"></i>
          <p>
            Brands
          </p>
        </a>
      </li>
      <li class="{{ Request::is('admin/product*')? 'active' : ''}}">
        <a href="{{ route('admin.product.index') }}" class="nav-link">
            <i class="fas fa-table text-info"></i>
          <p>
            Products
          </p>
        </a>
      </li>
      <li class="{{ Request::is('admin/review*') ? 'active' : ''}}">
        <a href="{{ route('admin.review.index') }}" class="nav-link">
            <i class="fas fa-table text-info"></i>
          <p>
            Review
          </p>
        </a>
      </li>

      <li class="{{ Request::is('admin/coupon*') ? 'active' : ''}}">
        <a href="{{ route('admin.coupon.index') }}" class="nav-link">
            <i class="fas fa-table text-info"></i>
          <p>
            Coupons
          </p>
        </a>
      </li>
      <li class="{{ Request::is('admin/user*') ? 'active' : ''}}">
        <a href="{{ route('admin.user.index') }}" class="nav-link">
            <i class="fas fa-table text-info"></i>
          <p>
            Users
          </p>
        </a>
      </li>
      @endif
    </ul>
  </nav>

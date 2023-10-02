<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('dashboard') }}">
    <i class="fas fa-check-circle fa-2x mr-3 text-info" style="{{-- font-size: 1.3rem; --}}"></i>
    <span class="h2">
      Ozone
    </span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    @if (false)
    <span class="navbar-toggler-icon"></span>
    @endif
    <i class="fas fa-list fa-2x"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @if (false)
        @can ('is-admin')
          <li class="nav-item border bg-light text-dark p-3">
            <a class="nav-link text-dark" href="{{ route('dashboard') }}">
              <i class="fas fa-tv mr-3"></i>
              Dashboard 
            </a>
          </li>
        @endcan
      @endif

      @if (preg_match("/shop/i", env('MODULES')))
        <li class="nav-item dropdown bg-light text-dark p-3 border">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="mobTopMenuShopDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-list text-secondry mr-3"></i>
            <span class="font-weight-bold">
            Shop
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="mobTopMenuShopDropdown">
            <a class="dropdown-item py-3" href="{{ route('sale') }}">
              @if (env('CMP_TYPE') == 'cafe')
                <i class="fas fa-skating mr-3"></i>
                Takeaway
              @else
                <i class="fas fa-dice-d6 mr-3"></i>
                Sales
              @endif
            </a>

            @if (env('CMP_TYPE') == 'cafe')
              <a class="dropdown-item py-3" href="{{ route('cafesale') }}">
                <i class="fas fa-table mr-3"></i>
                Tables
              </a>
            @endif

            <a class="dropdown-item py-3" href="{{ route('dashboard-purchase') }}">
              <i class="fas fa-shopping-cart mr-3"></i>
              Purchase
            </a>
            <a class="dropdown-item py-3" href="{{ route('dashboard-expense') }}">
              <i class="fas fa-wrench mr-3"></i>
              Expense
            </a>

            @if (true)
            <div class="dropdown-divider"></div>
            @endif
            <a class="dropdown-item py-3" href="{{ route('daybook') }}">
              <i class="fas fa-book mr-3"></i>
              Daybook
            </a>
            <a class="dropdown-item py-3" href="{{ route('weekbook') }}">
              <i class="fas fa-book mr-3"></i>
              Weekbook
            </a>
            <a class="dropdown-item py-3" href="{{ route('dashboard-report') }}">
              <i class="fas fa-chart-line text-secondary mr-3"></i>
              Report
            </a>
            @if (true)
            <div class="dropdown-divider"></div>
            @endif
            <a class="dropdown-item py-3" href="{{ route('online-order') }}">
              <i class="fas fa-cloud-download-alt mr-3"></i>
              Weborder
            </a>

            @if (true)
            <div class="dropdown-divider"></div>
            @endif

            <a class="dropdown-item py-3" href="{{ route('menu') }}">
              <i class="fas fa-list mr-3"></i>
              @if (env('CMP_TYPE') == 'cafe')
                Menu
              @else
                Products
              @endif
            </a>

            <a class="dropdown-item py-3" href="{{ route('dashboard-inventory') }}">
              <i class="fas fa-dolly mr-3"></i>
              Inventory
            </a>

            @if (true)
            <div class="dropdown-divider"></div>
            @endif

            <a class="dropdown-item py-3" href="{{ route('customer') }}">
              <i class="fas fa-users mr-3"></i>
              Customers
            </a>
            <a class="dropdown-item py-3" href="{{ route('dashboard-vendor') }}">
              <i class="fas fa-users mr-3"></i>
              Vendors
            </a>

          </div>
        </li>
      @endif

      {{-- CMS options --}}
      @if (preg_match("/cms/i", env('MODULES')))

        <li class="nav-item dropdown bg-light text-dark p-3 border">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="mobTopMenuCmsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-list text-secondry mr-3"></i>
            <span class="font-weight-bold">
            CMS
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="mobTopMenuDropdown2">
            <a class="dropdown-item py-2" href="{{ route('dashboard-cms-post') }}">
              <i class="fas fa-edit text-secondary mr-2"></i>
              Post
            </a>

            @if (false)
            <div class="dropdown-divider"></div>
            @endif

            <a class="dropdown-item py-2" href="{{ route('dashboard-cms-webpage') }}">
              <i class="fas fa-clone text-secondary mr-2"></i>
              Page
            </a>
            <a class="dropdown-item py-2" href="{{ route('dashboard-cms-gallery') }}">
              <i class="fas fa-images text-secondary mr-2"></i>
              Gallery
            </a>
            <a class="dropdown-item py-2" href="{{ route('dashboard-cms-nav-menu') }}">
              <i class="fas fa-link text-secondary mr-2"></i>
              Nav menu
            </a>
            <a class="dropdown-item py-2" href="{{ route('dashboard-cms-theme') }}">
              <i class="fas fa-palette text-secondary mr-2"></i>
              Theme
            </a>
          </div>
        </li>
      @endif

      {{-- Common things --}}
      <li class="nav-item border bg-light text-dark p-3">
        <a class="nav-link text-dark" href="{{ route('company') }}">
          <i class="fas fa-home mr-3"></i>
          <span class="font-weight-bold">
          Company
          </span>
        </a>
      </li>
      <li class="nav-item border bg-light text-dark p-3">
        <a class="nav-link text-dark" href="{{ route('dashboard-settings') }}">
          <i class="fas fa-cog mr-3"></i>
          <span class="font-weight-bold">
          Settings
          </span>
        </a>
      </li>
      <li class="nav-item border bg-light text-dark p-3">
        <a class="nav-link text-dark" href="{{ route('dashboard-users') }}">
          <i class="fas fa-users mr-3"></i>
          <span class="font-weight-bold">
          Users
          </span>
        </a>
      </li>
      <li class="nav-item border bg-light text-dark p-3">
        <a class="nav-link text-dark" href="{{ route('dashboard-todo') }}">
          <i class="fas fa-list mr-3"></i>
          <span class="font-weight-bold">
          Todo
          </span>
        </a>
      </li>
      <li class="nav-item border bg-light text-dark p-3">
        <a class="nav-link text-dark" href="{{ route('dashboard-help') }}">
          <i class="fas fa-question-circle mr-3"></i>
          <span class="font-weight-bold">
          Help
          </span>
        </a>
      </li>

      @guest
      @else
        <li class="nav-item dropdown bg-light text-dark p-3 border">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="mobTopMenuDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog text-secondry mr-2"></i>
            <span class="font-weight-bold">
            {{ Auth::user()->name }}
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="mobTopMenuDropdown2">
            <a class="dropdown-item" href="{{ route('dashboard-change-password') }}">
              <i class="fas fa-key text-secondary mr-2"></i>
              Change password
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"
            >
              <i class="fas fa-power-off mr-2 text-danger font-weight-bold"></i>
              <span class="text-danger font-weight-bold">
              Logout
            </a>
          </div>
        </li>
      @endguest

    </ul>
  </div>
</nav>

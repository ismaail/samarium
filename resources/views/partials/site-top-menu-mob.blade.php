<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="" style="color: #004;">
  @if (false)
  <i class="fas fa-check-circle"></i>
  @endif
  <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 50px;">
  {{ $company->name }}
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
        @if ($cmsNavMenuItem->type == 'item')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('website-webpage-' . $cmsNavMenuItem->webpage->permalink) }}">
              {{ $cmsNavMenuItem->name }}
            </a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-secondary" href="#"
                id="navbarDropdown-{{ $cmsNavMenuItem->name }}"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ $cmsNavMenuItem->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown-{{ $cmsNavMenuItem->name }}">
              @if ($cmsNavMenuItem->cmsNavMenuDropdownItems)
                @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
                  <a class="dropdown-item" href="{{ route('website-webpage-' . $cmsNavMenuDropdownItem->webpage->permalink) }}">
                    {{ $cmsNavMenuDropdownItem->name }}
                  </a>
                @endforeach
              @endif
            </div>
          </li>
        @endif
      @endforeach
    </ul>
  </div>
</nav>
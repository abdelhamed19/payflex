<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="/admin/home" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/admin/home">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>{{ __('admin.sidebar') }}</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            @forelse (App\Models\Sidebar::where('is_active',1)->get() as $item)
                <li class="nav-item {{ $item->children->isNotEmpty() ? 'dropdown' : '' }}">
                    @if ($item->children->isNotEmpty())
                        <a href="#ui-elements-{{ $item->id }}" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle nav-link">
                            <i class="{{ $item->icon }}"></i>
                            <span class="ml-3 item-text">{{ $item->getTranslation($item->name) }}</span>
                        </a>
                        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements-{{ $item->id }}">
                            @foreach ($item->children as $child)
                            <li>
                                <a class="nav-link pl-3" href="{{ $child->route }}">
                                    <i class="{{ $child->icon }}"></i>
                                    <span class="ml-1 item-text">{{ $child->getTranslation($child->name) }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <a class="nav-link" href="{{ $item->route }}">
                            <i class="{{ $item->icon }}"></i>
                            <span class="ml-3 item-text">{{ $item->getTranslation($item->name) }}</span>
                        </a>
                    @endif
                </li>
            @empty
                <li class="nav-item">
                    <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">No Sidebar</span></a>
                </li>
            @endforelse
        </ul>
    </nav>
</aside>

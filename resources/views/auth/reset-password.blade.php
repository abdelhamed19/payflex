<x-auth.auth-layout-component>
    @section('title','register')
    @section('content')
    <nav class="topnav navbar navbar-light">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="" id="modeSwitcher" data-mode="light">
                    <i class="fe fe-sun fe-16"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted my-2" href="#" id="languageDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fe fe-globe fe-16"></i>
                    @if (session('lang') == 'ar')
                        العربية
                    @else
                        English
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                    <a class="dropdown-item" href="{{ route('change.language', 'en') }}">English</a>
                    <a class="dropdown-item" href="{{ route('change.language', 'ar') }}">العربية</a>
                </div>
            </li>
        </ul>
    </nav>
    <x-flash-message />

    <div class="wrapper vh-700">
        <div class="row align-items-center h-100">
            <form action="{{ route('send.reset.password') }}" method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
                @csrf
                <div class="mx-auto text-center my-4">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ request()->url() }}">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-md"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                    </a>
                    <h2 class="my-3">{{ __('admin.reset_password') }}</h2>
                </div>
                <p class="text-muted">{{ __('admin.password_reset_instructions') }}</p>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">{{ __('admin.email') }}</label>
                    <input type="email" name="email" id="inputEmail" class="form-control form-control-lg"
                        placeholder="{{ __('admin.email') }}" autofocus="">
                        <x-validation-message field="email" />
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('admin.send') }}</button>
            </form>
        </div>
    </div>
    @endsection
</x-auth.auth-layout-component>

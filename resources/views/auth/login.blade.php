<x-auth.auth-layout-component>
    @section('title','login')
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
    <div class="wrapper">
        <div class="row align-items-center h-100">
            <form action="{{ route('send.login') }}" method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
                @csrf
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ request()->url() }}">
                    <svg version="1.1" id="logo" class="navbar-brand-img brand-md"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 120 120" xml:space="preserve">
                        <g>
                            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                        </g>
                    </svg>
                </a>
                <h1 class="h6 mb-3"></h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">{{ __('auth.email') }}</label>
                    <input type="email" id="inputEmail" name="email" value="{{ old('email') }}" class="form-control form-control-lg"
                        placeholder="{{ __('auth.email') }}" autofocus="">
                        <x-validation-message field='email' />
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">{{ __('auth.password') }}</label>
                    <input type="password" name="password" id="inputPassword" class="form-control form-control-lg"
                        placeholder="{{ __('auth.password') }}" >
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> {{ __('auth.remember_me') }} </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block mb-2" type="submit">{{ __('auth.login') }}</button>
                <div class="mb-3">
                    <p>{{ __('auth.login_with_provider') }}</p>
                    <a href="{{ route('provider.redirect','google') }}" class="btn btn-danger btn-block mb-2">
                        <i class="fab fa-google"></i> {{ __('auth.login_with', ['provider' => __('auth.google')]) }}
                    </a>
                    <a href="{{ route('provider.redirect','facebook') }}" class="btn btn-primary btn-block">
                        <i class="fab fa-facebook"></i> {{ __('auth.login_with', ['provider' => __('auth.facebook')]) }}
                    </a>
                    <a href="{{ route('provider.redirect','github') }}" class="btn btn-secondary btn-block">
                        <i class="fab fa-github"></i> {{ __('auth.login_with', ['provider' => __('auth.github')]) }}
                    </a>
                </div>
                <!-- زر نسيان كلمة المرور -->
                <div class="mb-3">
                    <a href="forget-password" class="text-muted">{{ __('auth.forgot_password') }}</a>
                </div>

                <!-- زر التسجيل -->
                <div class="border-top pt-3">
                    <p class="text-muted"> {{ __('auth.have_account') }}
                        <a href="register" class="btn btn-outline-secondary btn-sm">{{ __('auth.register') }}</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-auth.auth-layout-component>

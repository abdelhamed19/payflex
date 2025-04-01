<x-auth.auth-layout-component>
    @section('title', 'register')
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
        <div class="wrapper vh-50">
            <div class="row align-items-center h-100">
                <form action="{{ route('send.register') }}" method="POST" class="col-lg-6 col-md-8 col-10 mx-auto">
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
                        <h2 class="my-3">{{ __('auth.register') }}</h2>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">{{ __('auth.email') }}</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control" id="inputEmail4" placeholder="{{ __('auth.email') }}">
                        <x-validation-message field="email" />
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstname">{{ __('auth.first_name') }}</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                             id="firstname" class="form-control" placeholder="{{ __('auth.first_name') }}">
                            <x-validation-message field="first_name" />

                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastname">{{ __('auth.last_name') }}</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                            id="lastname" class="form-control" placeholder="{{ __('auth.last_name') }}">
                            <x-validation-message field='last_name' />

                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPassword5">{{ __('auth.password') }}</label>
                                <input type="password" name="password" class="form-control"
                                id="inputPassword5" placeholder="{{ __('auth.password') }}">
                                <x-validation-message field='password' />
                            </div>
                            <div class="form-group">
                                <label for="inputPassword6">{{ __('auth.confirm_password') }}</label>
                                <input type="password" name="password_confirmation"
                                 class="form-control" id="inputPassword6" placeholder="{{ __('auth.confirm_password') }}">
                                <x-validation-message field='password_confirmation' />

                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-2">{{ __('auth.password_requirements') }}</p>
                            <p class="small text-muted mb-2"> {{ __('auth.password_requirements_description') }} </p>
                            <ul class="small text-muted pl-4 mb-0">
                                <li>{{ __('auth.password_min_length') }}</li>
                                <li>{{ __('auth.password_special_character') }}</li>
                                <li>{{ __('auth.password_number') }}</li>
                                {{-- <li>{{ __('auth.password_not_previous') }}</li> --}}
                            </ul>
                        </div>

                    </div>
                    <button class="btn btn-lg btn-primary btn-block mb-3" type="submit">{{ __('auth.register') }}</button>
                </form>
            </div>
        </div>
    @endsection
</x-auth.auth-layout-component>

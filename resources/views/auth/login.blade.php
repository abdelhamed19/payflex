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
        </ul>
    </nav>
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
                <h1 class="h6 mb-3">Sign in</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" name="email" class="form-control form-control-lg"
                        placeholder="Email address" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control form-control-lg"
                        placeholder="Password" required="">
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Stay logged in </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block mb-2" type="submit">Let me in</button>

                <!-- زر نسيان كلمة المرور -->
                <div class="mb-3">
                    <a href="reset-password" class="text-muted">Forgot password?</a>
                </div>

                <!-- زر التسجيل -->
                <div class="border-top pt-3">
                    <p class="text-muted">Don't have an account?
                        <a href="register" class="btn btn-outline-secondary btn-sm">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-auth.auth-layout-component>

<nav class="navbar navbar-expand-lg text-white" style="background-color: #164892; border-radius: 30px;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0 justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="tel:+987007">Call Us : +987007</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="tel:+8801749386549"><i class="bi bi-telephone"></i>
                        +8801749386549</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="mailto:author@example.com"><i class="bi bi-envelope"></i>
                        Email: author@example.com</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-lg-0 justify-content-center">
                <li class="nav-item">
                    <a style="font-size: 1.0rem; color: white" class="nav-link btn btn-outline-success"
                        href="{{ route('admission.index') }}">{{ __('Admission') }}</a>
                </li>
                @if (Route::has('login') && Route::has('logout'))
                    @auth
                        <li class="nav-item">
                            <a style="font-size: 1.0rem; color: white" class="nav-link btn btn-outline-success"
                                href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button style="font-size: 1.0rem; color: white" class="nav-link btn btn-outline-warning"
                                    type="submit">{{ __('Log out') }}</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a style="font-size: 1.0rem; color: white" class="nav-link btn btn-outline-success"
                                href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a style="font-size: 1.0rem; color: white" class="nav-link btn btn-outline-primary"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>

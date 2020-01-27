@section('menu.top_landing')
    <div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top topbar">
        <a href="{{ route('dashboard.index') }}" class="navbar-brand">{{ env('APP_NAME', 'Portal') }}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuTopNav"
                aria-controls="menuTopNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuTopNav">
            <ul class="navbar-nav ml-auto">

                @if(\Illuminate\Support\Facades\Route::current()->getName() != 'register')
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link"><i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                </li>
                @endif

                @if(\Illuminate\Support\Facades\Route::current()->getName() != 'login')
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i> {{ __('Login') }}</a>
                </li>
                @endif

            </ul>
        </div>
    </div>
@endsection

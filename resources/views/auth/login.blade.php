@extends('layouts.app')

@section('content_login')

<div class="d-flex justify-content-center align-items-center vh-100" style="background: url('/images/bg.jpg') no-repeat center center/cover;">
    <div class="bg-white p-4 rounded shadow-lg" style="width: 400px;">
        <div class="text-center">
            <img src="{{ asset('images/logoppd2018.png') }}" alt="Logo" class="mb-3" style="width: 120px;">
            <h4 class="fw-bold">INTRANET</h4>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 text-center">
                <a href="#" class="btn btn-light w-100 border d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/google-icon.png') }}" alt="Google" style="width: 20px; margin-right: 10px;">
                    Correo institucional
                </a>
            </div>

            <p class="text-center">o también...</p>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-danger">ENTRAR</button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link text-center" href="{{ route('password.request') }}">Forgot Your Password?</a>
                @endif
            </div>
        </form>

        <div class="text-center mt-3">
            <small>Desarrollado por <strong>NEOC Soft</strong></small>
        </div>

        <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="#"><img src="{{ asset('images/facebook.png') }}" alt="Facebook" style="width: 30px;"></a>
            <a href="#"><img src="{{ asset('images/instagram.png') }}" alt="Instagram" style="width: 30px;"></a>
            <a href="#"><img src="{{ asset('images/youtube.png') }}" alt="YouTube" style="width: 30px;"></a>
        </div>
    </div>
</div>
@endsection

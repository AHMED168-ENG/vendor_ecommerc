@extends('frontEnd/index')

@section('content')
<div class="signin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="right p-4 mb-3">

                    <h4>مرحبا بعودتك!</h4>
                    <br /> <br />

                    <form method="post" action="{{route('login')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">الايميل</label>
                            <input type="email" name="email" autocomplete="email" required autofocus value="{{old("email")}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">كلمة المرور</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                        </div>
                        <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>

                    <p class="mb-0 mt-2">
                        ليس لديك حساب؟ <a href="register">سجل هنا</a>
                    </p>

                </div>
            </div>

            <div class="col-md-6">
                <div class="left">
                    <img src="{{asset("public/asset/frontEnd/img/login.svg")}}" class="img-fluid" alt="0" />
                </div>
            </div>

        </div>

    </div>
</div>
@section('script')
    <script src="{{ asset('public/js/app.js') }}" defer></script>
@endsection
@endsection

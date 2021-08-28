@extends('frontEnd/index')

@section('content')
<div class="reset_password">
<div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="right">

                    <h3 class="h3">{{ __('Reset Password') }}</h3>
                    <br /> <br />
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post" action="{{route('password.email')}}">
                        @csrf
                        <label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<style>
    .reset_password {
        width:100%;
        background:#eee;
        padding:40px 0;
    }
    .reset_password .container .row > div input {
        margin:12px 0
    }
    .reset_password .container .row > div .right .h3 {
        padding-bottom:12px;
        margin-right:15px;
        text-transform: capitalize;
        position: relative;
        display: inline-block
    }
    .reset_password .container .row > div .right .h3::after {
        content:"";
        width:60%;
        right:0;
        bottom:0;
        height:1px;
        background:#007bff;
        position: absolute
    }
</style>

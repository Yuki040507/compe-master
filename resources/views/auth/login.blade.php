@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
    <div class="card">
        <section class="section-login section-main">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="groupname_id" class="col-md-4 col-form-label text-md-right">{{ __('ユーザーID') }}</label>

                    <div class="col-md-6">
                        <input id="groupname_id" type="text" class="form-control @error('groupname_id') is-invalid @enderror" name="groupname_id" value="{{ old('groupname_id') }}" required autocomplete="groupname_id" autofocus>

                        @error('groupname_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('ログイン情報を記憶する') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('ログイン') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('パスワード を忘れましたか？') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
</main>
@endsection

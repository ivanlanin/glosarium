@extends('layouts.app')

@push('metadata')
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ trans('user.description') }}">
<meta name="author" content="{{ config('app.name') }}">

<meta property="og:title" content="{{ $title }}" />
<meta property="og:description" content="{{ trans('user.description') }}" />
<meta property="og:author" content="{{ config('app.name') }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:locale" content="id_ID" />
<meta property="og:site_name" content="{{ config('app.name') }}" />
<meta property="og:image" content="{{ asset($image) }}" />
@endpush


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title }}</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">@lang('user.field.email')</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">@lang('user.field.password')</label>

                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember">@lang('user.field.remember')
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                @lang('user.btn.login')
                            </button>

                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                @lang('user.forgotPassword')
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-5 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Iklan</div>
                <div class="panel-body">
                    @include('partials.ad-responsive')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

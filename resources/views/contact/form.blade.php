@extends('layouts.app')

@push('metadata')
    <meta name="title" content="{{ trans('contact.sendMessage') }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="description" content="{{ trans('contact.description') }}">

    <meta property="og:title" content="{{ trans('contact.sendMessage') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:description" content="{{ trans('contact.description') }}">
    <meta property="og:url" content="{{ route('contact.form') }}">
    <meta property="og:image" content="{{ $imagePath }}">
@endpush

@section('heading')
    @include('partials.title')
@endsection

@section('content')
<vue-progress-bar></vue-progress-bar>

<h2 class="text-center">{{ trans('contact.heading') }}<br/>
    <small>{{ trans('contact.subheading') }}</small>
</h2>
<div class="white-space-20"></div>
<div class="row">
    <div class="col-md-8 col-md-offset-2" v-cloak>

        @include('partials.message')

        <alert :show="alerts.message" :type="alerts.type" :title="alerts.title">
            <p>@{{ alerts.message }}</p>
        </alert>

        <!-- form contact -->
        <form @submit.prevent="send" action="{{ route('contact.post') }}" method="post">
            {{ csrf_field() }}

            <div v-bind:class="['form-group', errors.email ? 'has-error' : '']">
                <label>{{ trans('contact.form.email') }}</label>
                @if (auth()->check())
                    <input disabled="" type="email" name="email" class="form-control disabled" value="{{ auth()->user()->email }}">
                @else
                    <input v-model="forms.email" :disabled="loading" name="email" type="email" class="form-control" value="{{ old('email') }}">
                @endif

                <span v-if="errors.email" class="label label-danger">@{{ errors.email[0] }}</span>
            </div>

            <div v-bind:class="['form-group', errors.subject ? 'has-error' : '']">
                <label>{{ trans('contact.form.subject') }}</label>
                <input v-model="forms.subject" :disabled="loading" name="subject" type="text" class="form-control" value="{{ old('subject') }}">

                <span v-if="errors.subject" class="label label-danger">@{{ errors.subject[0] }}</span>
            </div>

            <div v-bind:class="['form-group', errors.message ? 'has-error' : '']">
                <label>{{ trans('contact.form.message') }}</label>
                <textarea v-model="forms.message" :disabled="loading" name="message" class="form-control" rows="6" value="{{ old('message') }}"></textarea>

                <span v-if="errors.message" class="label label-danger">@{{ errors.message[0] }}</span>
            </div>

            <div class="form-group text-center">
                <div class="white-space-10"></div>
                <button :disabled="loading" type="submit" class="btn btn-theme btn-lg btn-long btn-t-primary btn-pill">{{ trans('contact.btn.send') }} <i v-if="loading" class="fa fa-spinner fa-spin"></i></button>
            </div>
        </form>
        <!-- end form contact -->
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('js/contact.form.js') }}"></script>
@endpush

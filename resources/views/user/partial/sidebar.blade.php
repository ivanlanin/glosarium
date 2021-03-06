<div class="col-md-2 col-sm-2">
    <div class="block-section">
        <div class="text-center">
            <img src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?s=150" class="img-rounded" alt="{{ auth()->user()->name }}">
        </div>

        <div class="white-space-20"></div>
        <h3 class="text-center">{{ auth()->user()->name }}</h3>

        <div class="white-space-20"></div>

        <ul class="list-unstyled">
            @if (auth()->user()->type == 'admin')
                <li><a href="{{ url('admin/glosarium/word') }}">Kata</a></li>
                <li><a href="{{ url('admin/glosarium/category') }}">Kategori</a></li>
                <li><a href="{{ url('admin/user') }}">Kontributor</a></li>
                <hr>
            @endif

            <li><a href="{{ route('user.account.token') }}">@lang('user.token')</a></li>

            <li><a href="{{ route('user.notification.index') }}"> Notifikasi ({{ auth()->user()->unreadNotifications->count() }})</a></li>
            <li><a href="{{ route('user.password.form') }}"> Ubah Sandi Lewat</a></li>
        </ul>
        <div class="white-space-20"></div>
        <a href="{{ route('glosarium.word.create') }}" class="btn  btn-line soft btn-theme btn-pill btn-block">Tambah Glosari</a>
    </div>
</div>

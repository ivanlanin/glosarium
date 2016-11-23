@extends('layouts.app')

@push('metadata')
<meta name="title" content="{{ trans('word.apa') }}">
<meta name="description" content="{{ config('app.description') }}">
<meta name="author" content="{{ config('app.name') }}">

<meta property="og:title" content="{{ trans('word.apa') }}" />
<meta property="og:description" content="{{ config('app.description') }}" />
<meta property="og:author" content="{{ config('app.name') }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:locale" content="id_ID" />
<meta property="og:site_name" content="{{ config('app.name') }}" />
<meta property="og:image" content="{{ asset($path.$file) }}" />
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('controllers.words.partials.ad-billboard')
        </div>

        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ $title or null }}</div>
                <div class="panel-body">

                    <h2>Dokumentasi @lang('word.apa')</h2>
                    <p>Anda dapat melakukan permintaan ke aplikasi Glosarium untuk mendapatkan data dengan format JSON. Adapaun, daftar API yang tersedia untuk saat ini adalah:</p>

                    <ul>
                        <li>
                            <a href="#search">Pencarian Glosarium Berdasarkan Katakunci</a>
                            <ul>
                                <li><a href="#search_request">Permintaan</a></li>
                                <li><a href="#search_response">Kembalian</a></li>
                                <li><a href="#search_code">Contoh Kode</a></li>
                            </ul>
                        </li>
                        <li>
                            Tambah Baru Glosarium
                            <ul>
                                <li>Permintaan</li>
                                <li>Kembalian</li>
                                <li>Contoh Kode</li>
                            </ul>
                        </li>
                        <li>
                            Sugesti Perubahan Glosarium
                            <ul>
                                <li>Permintaan</li>
                                <li>Kembalian</li>
                                <li>Contoh Kode</li>
                            </ul>
                        </li>
                    </ul>

                    <hr>

                    <h3 id="search"><a href="#search">#</a> Pencarian Glosarium</h3>
                    <p>Memungkinkan Anda untuk mencari beberapa glosarium sekaligus dengan satu kata kunci.</p>

                    <h4 id="search_request"><a href="#search_request">#</a> Permintaan</h4>
                    <p>Permintaan pengguna pada server akan mengembalikan data dalam format JSON. Adapun atribut, tipe data, dan nilai yang dikembalikan adalah sebagai berikut.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Titik Akhir</td>
                                <td><a href="{{ route('api.word.search') }}">{{ route('api.word.search') }}</a></td>
                            </tr>
                            <tr>
                                <td>Parameter</td>
                                <td>
                                    <ul>
                                        <li><code>word</code> (String): kata yang ingin dicari dalam daftar glosarium.</li>
                                        <li><code>limit</code> (Integer): batas maksimal data yang akan ditampilkan.</li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <h4 id="search_response"><a href="#">#</a> Kembalian</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Atribut</th>
                                <th>Tipe Data</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><code>status</code></td>
                                    <td>Boolean</td>
                                    <td><code>true</code> atau <code>false</code></td>
                                    <td>Indikasi permintaan berhasil diproses</td>
                                </tr>
                                <tr>
                                    <td><code>total</code></td>
                                    <td>Integer</td>
                                    <td><code>10</code></td>
                                    <td>Jumlah data yang dikembalikan</td>
                                </tr>
                                <tr>
                                    <td><code>contents</code></td>
                                    <td>Object</td>
                                    <td><pre>
[
    'origin'    => 'Hardware',
    'glosarium' => 'Perangkat Keras',
    'spell'     => '/pe-rang-kat ke-ras/',
    'createdAt' => '2016-11-21T18:20:36+0700',
    'updatedAt' => '2016-11-21T18:20:36+0700',
    'descriptions' => []
]</pre></td>
                                    <td>Data lengkap mengenai glosarium yang dicari</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 id="search_code"><a href="#search_code">#</a> Contoh Kode</h4>
                    <p>Berikut contoh kode menggunakan bahasa pemrograman PHP dan menggunakan pustaka CURL. Pastikan Anda sudah menginstal pustaka CURL pada server.</p>
                    <pre>
if (!function_exists('curl_init')) {
    die('CURL belum diinstal dalam sistem.');
}

$word = 'tool';

$curl = curl_init('{{ config('app.url') }}/api/word/search?word='.$word);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = json_decode($curl);

curl_close($curl);

if ($response->status === true) {
    // do something
}
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@component('mail::message')
# Hi,

Terdapat tiket bantuan baru di aplikasi <b>{{ config('app.name') }}</b>.

@component('mail::table')
| <!-- -->    | <!-- -->    |
|-------------|-------------|
| <b>Nama</b>         | {{ $userName }}         |
| <b>Email</b>        | {{ $userReplyTo }}        |
| <b>Pesan</b>     | {{ $message }}         |
@endcomponent
@endcomponent
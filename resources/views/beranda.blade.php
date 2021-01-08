<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Beranda</title>
  </head>
  <body>
    @if (Auth::guest())
      <h1>Belum Login</h1>
    @else
     <h1>{{Auth::user()->nama_pegawai}}</h1>
      <a href="/api/gudang?api_token={{Auth::user()->api_token}}">cek gudang</a>
      <a href="/logout">logout</a>

    @endif
  </body>
</html>

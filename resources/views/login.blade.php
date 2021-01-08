<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <h2>Login</h2>
    <form action="{{route('login')}}" method="post">
      {{csrf_field()}}
      <input type="text" name="id_pegawai" placeholder="id pegawai">
      <input type="password" name="password" placeholder="password">
      <input type="submit" name="login" value="Login">
    </form>
  </body>
</html>

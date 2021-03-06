<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
      <link rel="stylesheet" href="/css/note.css">
    <link rel="stylesheet" href="/assets/lib/bootstrap/dist/css/bootstrap.min.css">





</head>
<body>
  @include('navbar')
  <div class="container">
    @yield('content')

  </div>





<script src="/assets/lib/jquery/dist/jquery.min.js"></script>
<script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/js/note.js"></script>
</body>

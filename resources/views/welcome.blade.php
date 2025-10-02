<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'App')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="container py-4">
    <a href="#" class="btn btn-primary">Teste</a>
  @yield('content')
</body>
</html>

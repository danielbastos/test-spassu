<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Sistema de Livros')</title>
  @stack('scripts')
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  {{-- Navbar Bootstrap --}}
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('livros.index') }}">📚 Biblioteca</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('livros.index') }}">Livros</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('assuntos.index') }}">Assuntos</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('autores.index') }}">Autores</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container">
    @if(session('ok'))
      <div class="alert alert-success">{{ session('ok') }}</div>
    @endif

    @yield('content')
  </main>

  <footer class="text-center mt-5 mb-3 text-muted">
    <small>&copy; {{ date('Y') }} Biblioteca Laravel</small>
  </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Person</title>
</head>
<body class="container mt-3">
    <header class="d-flex justify-content-between align-items-center">
        <a href="/" class="text-decoration-none text-dark">
            <div>
                <img width="50" src="https://mh-2-agencia-estoque.panthermedia.net/media/media_detail/0014000000/14230000/14230815_detail.jpg" alt="">
                <strong>Person</strong>
            </div>
        </a>
       <nav class="d-flex gap-3 ">
            @if(Auth::user())
                @if(Auth::user()->isAdmin == 1)
                    <a class="btn " href="{{ route('users.create') }}">Novo Usuario</a>
                    <a class="btn" href="{{ route('users.index') }}">Dashboard</a>
                @endif
                <a class="btn" href="{{ route('users.show', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">sair</button>
                </form>
            @else
                <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                <a class="nav-link" href="{{ route('users.create') }}">Cadastrar</a>
            @endif
       </nav>
    </header>

        @if(session()->has('create'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('create') }}.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('edit'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('destroy'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('destroy') }}.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    @yield('main')

    <footer class="d-flex justify-content-center mt-5">
        <p>&copy;2022 Leandro Cavalvante todos os direitos reservados</p>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

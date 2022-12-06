<nav class="navbar navbar-expand-lg shadow-sm border-bottom">
    <div class="container">
      <a class="navbar-brand" href="#">CRUD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{route('person.index')}}">Pessoas</a>
            </li>
            <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn">Logout</button>
                </form>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Cadastro</a>
            </li>
            @endauth
        </ul>
      </div>
    </div>
</nav>

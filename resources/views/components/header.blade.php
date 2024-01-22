<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Нарушениям.нет</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @auth
          @if (Auth::user()->id_role == 2)
          <li class="nav-item">
            <a class="nav-link" href="/applications">Заявления</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/profile">Личный кабинет</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="/logout">Выход</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>

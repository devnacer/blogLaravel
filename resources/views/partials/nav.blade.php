<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            @auth

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('profil.home')}}">Accueil</a>
                    </li>

                    {{-- profil --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profil.index') }}">Voir tous les admins</a></li>

                      @can('create', App\Models\Profil::class)
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="{{ route('profil.create') }}">Ajouter un admin</a></li>
                          
                      @endcan

                        </ul>
                    </li>
                    {{-- end_profil --}}

                    {{-- article --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Article  
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item" href="{{ route('article.index') }}">Voir tous les articles</a></li>

                            <li><a class="dropdown-item" href="{{ route('articles.index') }}">Voir mes articles</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li><a class="dropdown-item" href="{{ route('article.create') }}">Ajouter un article</a></li>

                        </ul>
                    </li>
                    {{-- end_article --}}

                    {{-- category --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Catégories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('category.index') }}">Voir toutes les catégories</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('category.create') }}">Ajouter une Catégorie</a>
                            </li>
                        </ul>
                    </li>
                    {{-- end_category --}}

                    {{-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> --}}

                    {{-- login --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->email }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('setting.show', Auth::user()->id) }}">Paramètre</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Déconnexion</a></li>
                        </ul>
                    </li>
                    {{-- end_login --}}

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

            @endauth


        </div>
    </div>
</nav>

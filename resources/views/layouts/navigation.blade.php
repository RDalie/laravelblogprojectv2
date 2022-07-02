<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="/assets/img/navbar-logo.svg" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('posts.index')}}">Posts</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{route('posts.create')}}">Create</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
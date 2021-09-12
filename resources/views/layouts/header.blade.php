<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="text-transform: uppercase;">Test App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            {{-- <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;"> --}}
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;"">
                @guest
                <li class=" nav-item">
                <a class="nav-link" href="{{ route('import') }}" style="text-transform: uppercase;">Import Csv</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
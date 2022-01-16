<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="/">We Like Blogging</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="/blog">List Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/reviews">List Reviews</a>
            </li>
            @if( auth()->check() )
                <li class="nav-item">
                   <a class="nav-link font-weight-bold text-success" href="#">Hi {{ auth()->user()->name }}!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog/create/post">Write a Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log Out</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Log In</a>
                </li>
            @endif
        </ul>
    </div>
</nav>

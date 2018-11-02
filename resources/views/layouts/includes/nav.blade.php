<ul class=" nav nav-tabs nav-fill" id="top">
        <li class="nav-item">
            <a href="/home" class="nav-link">Home <i class="fas fa-search"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Movies <i class="fas fa-film"></i></a>
            <div class="dropdown-menu">
                <a class="dropdown-item cnav" href="/movies/nowplaying"><p>Now Playing</p><span class="nav-icon"><img src="/img/movie-icon/now_playing.png"/></span></a>
                <a class="dropdown-item cnav" href="/movies/popular"><p>Popular</p><span class="nav-icon"><img src="/img/movie-icon/popular.png"/></span></a>
                <a class="dropdown-item cnav" href="/movies/upcoming"><p>Upcoming</p><span class="nav-icon"><img src="/img/movie-icon/upcoming.png"/></span></a>
                <a class="dropdown-item cnav" href="/movies/toprated"><p>Top Rated</p><span class="nav-icon"><img src="/img/movie-icon/top_rated.png"/></span><a>
        </li>
    <li class="nav-item">
            <a href="/profile/{{Auth()->id()}}" class="nav-link active">Profile <i class="fas fa-user"></i></a>
        </li>
        <li class="nav-item">
            <a href="/logout" class="nav-link">Logout <i class="fas fa-power-off"></i></a>
        </li>
</ul>

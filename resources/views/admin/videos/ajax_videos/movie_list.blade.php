<div class="list-group">
    @foreach($movies as $movie)

        <a href="{{ route('admin.videos.create.tmdb', $movie->getID()) }}" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="row">
                <div class="col-md-3 pull-left">
                    <img class="round" src="{{ tmdb()->getImageURL('w185') . $movie->getPoster() }}"/>
                </div>
                <div class="col-md-9">
                    <div class="d-flex w-100 justify-content-between text-left">
                        <h5 class="mb-1">{{ $movie->getTitle() }}</h5>
                        <small class="text-muted">Rating : {{ $movie->getVoteAverage() }}</small>
                    </div>
                    <p class="mb-1 text-left"> {{ $movie->getOverview() }}</p>
                    <small class="text-muted text-left">Released {{ $movie->getReleaseDate()  }}, Language : {{ ucwords($movie->getLanguage() ) }}</small>
                </div>
            </div>
        </a>

    @endforeach
</div>
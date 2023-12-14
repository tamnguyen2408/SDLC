<div class="featured_album">
    <div class="background_image featured_background" style="background-image:url(images/featured.png)"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="section_title_container">
                    <div class="section_subtitle">Events</div>
                    <div class="section_title"><h1>Featured Album</h1></div>
                </div>
            </div>
        </div>
        <div class="row featured_row row-lg-eq-height">

            <!-- Featured Album Image -->
            <div class="col-md-6">
                <div class="featured_album_image">
                    <div class="image_overlay"></div>
                    <div class="background_image" style="background-image:url(images/chill.jpg)"></div>
                    <!-- <img src="images/featured_album.jpg" alt=""> -->
                </div>
            </div>

            <!-- Featured Album Player -->
            <div class="col-md-6 featured_album_col">
                <div class="featured_album_player_container d-flex flex-column align-items-start justify-content-center">
                    <div class="featured_album_player">
                        <div class="featured_album_title_bar d-flex flex-row align-items-center justify-content-start">
                            <div class="featured_album_title_container">
                                <div class="featured_album_artist">List of Songs</div>
                                <div class="featured_album_title">Love is all Around</div>
                            </div>
                            <div class="featured_album_link ml-auto"><a href="#">buy it on itunes</a></div>
                        </div>
                        @foreach ($song as $item)
                            <div class="jp-type-playlist mb-3">
                                <div class="player_details d-flex flex-row align-items-center justify-content-start">
                                    <div class="ml-3">
                                        <img width="60" class="img-fluid rounded" src="{{ URL::to('/uploads/images') }}/{{ $item->poster_music }}" alt="Album Cover">
                                    </div>
                            
                                    <div class="jp-details ml-3">
                                        <div class="text-muted small">Now Playing</div>
                                        <div class="jp-title h5"><a href="{{ route('fr.detail', ['id' => $item->id]) }}">
                                            {{ $item->name }}
                                        </a></div>
                                    </div>
                            
                                   
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            

                
            </div>

        </div>
    </div>
</div>
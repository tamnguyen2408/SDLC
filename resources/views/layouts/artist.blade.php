<div class="artist">
    <div class="container">
        <div class="row">

            <!-- Artist Image -->
            <div class="col-lg-4 artist_image_col">
                <div class="artist_image">
                    <img src="images/artist.jpg" alt="">
                </div>
            </div>

            <!-- Artist Content -->
            <div class="col-lg-6 offset-lg-1">
                <div class="artist_content">
                    <div class="section_title_container">
                        <div class="section_subtitle">Events</div>
                        <div class="section_title">
                            <h1>The Artist</h1>
                        </div>
                    </div>
                    <div class="artist_text">
                        <p> Luong Nguyen Hoai Bao, a young Vietnamese male vocalist who is currently performing
                            in the Southern region, is the real name of NB3 Hoai Bao.
                            .</p>
                        <p>The audience took notice of Hoai Bao's recent release of the song "Thumbs" very fast.
                            A boy's intense feelings for a girl are the subject of the song "Love Secretly".
                            Though he can't admit it, this guy only feels lonely at night and loves the girl.
                            This R&B pop song has a well-developed verse structure with a chorus, pre-chorus,
                            rap section in the middle, and a bridge that ends just before the song's chorus. The
                            arrangement of "Thuong Tham" makes the listener feel at ease, and the melody is
                            easy to listen to.
                            .</p>
                    </div>
                    <div
                        class="single_player_container d-flex flex-column align-items-start justify-content-center">
                        <div class="single_player">
                            <div id="jplayer_2" class="jp-jplayer"></div>
                            <div id="jp_container_2" class="jp-audio" role="application"
                                aria-label="media player">
                                <div class="jp-type-single">
                                    <div
                                        class="player_details d-flex flex-row align-items-center justify-content-start">
                                        <div class="jp-details">
                                            <div>playing</div>
                                            <div class="jp-title">{{ $desiredSongName }}</div>
                                        </div>
                                        <div class="jp-controls-holder ml-auto">
                                            <audio controls>
                                                <source
                                                    src="{{ URL::to('/uploads/songs') }}/{{ $desiredSongAudio }}"
                                                    type="audio/mpeg">
                                            </audio>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Image -->
            

        </div>
    </div>
</div>

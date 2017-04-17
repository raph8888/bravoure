<div class="container artists_container">

    <div class="row">

        <h3 class="padding_media">Upcoming Artists</h3>

        @foreach ($artists as $artist)

            <div class="padding_left_40 col-sm-12 col-sm-6 col-md-4 col-lg-3" syle="display: inline;">

                <img width="250" height="360" src="images/artists/{{ $artist->artist_img }}"/>

                <p>{{ $artist->artist_name }}</p>

                <p>{{ $artist->artist_desc }}</p>

            </div>

        @endforeach

    </div>

</div>

<div class="container artists_container">

    <div class="row">

        <h3 class="padding_media">Upcoming Artists</h3>

<div class="more-info-desktop">

        <div class="artists_cols more-info-container-col padding_left_40 col-sm-12 col-sm-6 col-md-4 col-lg-3" syle="display: inline;">

            <div class="more-info-container">
                <p class="more-info-desktop-text">More info</p>
            </div>

            <div style="max-width: 250px; margin-top: 12px;">

                <p class="artists_name">Eefje de Visser</p>

                <img class="more_info_img" src="images/more-info.png" width="20px">

            </div>


            <p class="artists_desc">Zonder tegenwind kun je niet gaan vliegen</p>

        </div>

</div>

        @foreach ($artists as $artist)

            <div class="artists_cols padding_left_40 col-sm-12 col-sm-6 col-md-4 col-lg-3" syle="display: inline;">

                <img class="artists_img" width="250" height="360" src="images/artists/{{ $artist->artist_img }}"/>

                <div style="max-width: 250px; margin-top: 12px;">


                    <p class="artists_name">{{ $artist->artist_name }}</p>

                    <img class="more_info_img" src="images/more-info.png" width="20px">

                </div>


                <p class="artists_desc">{{ $artist->artist_desc }}</p>

            </div>

        @endforeach

    </div>

</div>

<style>

    .more-info-container {
        bottom: 12px;
        position: relative;
        background-color: #f2a0a1;
        width: 250px;
        height: 360px;
        box-shadow: 0px 5px 21px #9CA8B7;
    }

    .more-info-desktop-text {
        position: absolute;
        color: white;
        font-size: 23px;
        top: 44%;
        left: 32%;
    }

    .artists_img {
        display: block;
    }

    .artists_cols {
        margin-bottom: 40px;
    }

    .artists_name {
        font-size: 17px;
        display: inline;
    }

    .artists_desc {
        color: #9d9d9d;
        padding-top: 10px;
    }

    .more_info_img {
        display: inline;
        float: right;
    }

</style>

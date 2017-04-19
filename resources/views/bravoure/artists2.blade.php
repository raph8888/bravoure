<div class="artists_container">

        <h3 class="padding-left-60">Upcoming Artists</h3>

<div id="scrollable">
<div id="items">


    <div class="more-info-desktop">

        <div class="artists_cols more-info-container-col style="display: inline;">

       <a href="{{ url('/bravoure') }}">
           <div class="more-info-container">
            <p class="more-info-desktop-text">More info</p>
        </div>
       </a>

        <div style="max-width: 250px; margin-top: 12px;">

            <p class="artists_name">Eefje de Visser</p>

            <img class="more_info_img" src="images/more-info.png" width="20px">

        </div>


        <p class="artists_desc">Zonder tegenwind kun je niet gaan vliegen</p>

    </div>

</div>

        @foreach ($artists as $artist)

            <div class="artists_cols">

                <img class="artists_img" width="250" height="360" src="images/artists/{{ $artist->artist_img }}"/>

                    <p class="artists_name">{{ $artist->artist_name }}</p>

                    <img class="more_info_img" src="images/more-info.png" width="20px">

                <p class="artists_desc">{{ $artist->artist_desc }}</p>

            </div>

        @endforeach

</div>
</div>


</div>

<style>
    #items {
        width: 90000px;
        padding-left: 50px;
    }

    .artists_cols {
        display: inline;
        float:left;
        max-width: 250px;
        margin: 0px 10px 40px 10px;
    }

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
        top: 42%;
        left: 32%;
        border-bottom: 3px solid #fff;
        padding-bottom: 5px;
    }

    .artists_img {
        margin-bottom: 8px;
        display: block;
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

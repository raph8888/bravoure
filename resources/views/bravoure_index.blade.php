@extends('layouts.master')

@section('content')

    <div class="container menu_container">

        <div class="row">



            <div class="col-sm-12 col-sm-6 col-md-8 col-lg-7 padding-left-0">
                <div class="menu_background">
                </div>
            </div>
            <span class="company_name">The XX</span>


            <div class="col-sm-12 col-sm-6 col-md-4 col-lg-5">
                <div class="menu_description">

                    <p>The xx is een driekoppige Engelse indieband, gevrmd in Wandsworth, Londen in 2005. De drie brachten
                        hun debuutalbum, xx, uit in augustus 2009. Het kwam op de eerste plaats van de "best of 2009"-lijst
                        van The Guardian en op de tweede op die van NME.</p>

                </div>
            </div>

        </div>

        <div class="menu_description_mobile">

            <p>The xx is een driekoppige Engelse indieband, gevrmd in Wandsworth, Londen in 2005. De drie brachten hun
                debuutalbum, xx, uit in augustus 2009. Het kwam op de eerste plaats van de "best of 2009"-lijst van The
                Guardian en op de tweede op die van NME.</p>


        </div>

    </div>


    <div class="container artists_container">

        <div class="row">

            <h3 class="padding_left_15">Upcoming Artists</h3>

            @foreach ($artists as $artist)

                <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3" syle="display: inline;">

                    <img width="250" height="360" src="images/artists/{{ $artist->artist_img }}"/>

                    <p>{{ $artist->artist_name }}</p>

                    <p>{{ $artist->artist_desc }}</p>

                </div>

            @endforeach

        </div>

    </div>

    </div>

@endsection

<style>

    .menu_container {
        width: 100% !important;
    }

    .img-responsive {
        display: block;
        margin-left: auto;
        margin-right: auto
    }

    /*
    ** Deskot View
    ** This takes effect until the screen reaches below 1100px
    */

    @media screen and (min-width: 1000px) {

        .menu_description {
            max-width: 300px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding-top: 34vw;
        }

        .menu_description_mobile {
            display: none;
        }

        .artists_container {
            margin-top: 50px;
        }

        .padding_left_15 {
            padding-left: 15px;
        }

        .menu_background {
            background-image: url(images/menu_background.png);
            background-size: 60vw;
            background-repeat: no-repeat;
            min-height: 607px;
        }

        .padding-left-0 {
            padding-left: 0px !important;
        }

        .company_name {
            font-size: 16vw;
            color: #F4A0A0;
            position: absolute;
            z-index: 3;
            top: 11vw;
            left: 28vw;
            float: right;
        }

    }

        /*
        ** Mobile View
        ** This takes effect until the screen reaches above 1100px
        */
        @media screen and (max-width: 1000px) {

            .menu_description {
                display: none;
            }

            .menu_description_mobile {
                padding-top: 20px;
                max-width: 317px;
                position: relative;
            }
        }

</style>
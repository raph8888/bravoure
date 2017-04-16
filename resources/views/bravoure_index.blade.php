@extends('layouts.master')

@section('content')

    <div class="container menu_container">

        {{--Desktop row--}}
        <div class="row desktop-view">

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



{{--Mobile row--}}

        <div class="row mobile-view">

            <div class="mobile_background_col col-sm-12 col-sm-12 col-md-12 col-lg-12 padding-left-20">
                <div class="menu_background_mobile">
                </div>
            </div>
            <span class="company_name_mobile">The XX</span>


            <div class="col-sm-12 col-sm-12 col-md-12 col-lg-12">
                <div class="padding_left_20 menu_description_mobile">

                    <p>The xx is een driekoppige Engelse indieband, gevrmd in Wandsworth, Londen in 2005. De drie brachten hun
                        debuutalbum, xx, uit in augustus 2009. Het kwam op de eerste plaats van de "best of 2009"-lijst van The
                        Guardian en op de tweede op die van NME.</p>


                </div>
            </div>

        </div>
        
        
        



    </div>


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

    </div>

@endsection

<style>

    .menu_container {
        width: 100% !important;
    }

    /*
    ** Deskot View
    ** This takes effect until the screen reaches below 1100px
    */

    @media screen and (min-width: 700px) {

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

        .padding_media {
            padding-left: 15px;
        }
        
        .mobile-view {
            display: none;
        }

    }

        /*
        ** Mobile View
        ** This takes effect until the screen reaches above 1100px
        */
        @media screen and (max-width: 700px) {

            .mobile_background_col {
            padding-right: 0px !important;
            padding-left: 52px !important;
        }

            .company_name_mobile {
                color: #F4A0A0;
                position: absolute;
                top: 25vh;
                left: 2vh;
                font-size: 14vh;
            }

            .menu_background_mobile {
                background-image: url(images/menu_background_mobile.png);
                background-size: 100%;
                background-repeat: no-repeat;
                width: 100%;
                height: 71%;            }

            .desktop-view {
                display: none;
            }

            .menu_description {
                display: none;
            }

            .menu_description_mobile {
                padding-top: 20px;
                width: 90%;
                position: relative;
            }
            .padding_media {
                padding-left: 40px;
            }
            .padding_left_40{
                padding-left:40px !important;
            }
            .padding_left_20{
                padding-left:20px !important;
            }
        }

</style>
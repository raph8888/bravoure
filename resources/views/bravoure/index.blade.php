@extends('layouts.master')

@section('content')

    <div class="container menu_container">

        {{--Desktop View Starts--}}

        <div class="row desktop-view">

            <div class="desktop-links">

                <a href={{url('/bravoure')}}><span class="b-link inline-link">B</span></a>
                <a href={{url('/bravoure')}}><span class="events-link inline-link">Events</span></a>
                <a href={{url('/bravoure')}}><span class="info-link inline-link">Info</span></a>
                <a href={{url('/bravoure')}}><span class="contact-link inline-link">Contact</span></a>
                <a href={{url('/bravoure')}}><span class="tickets-link inline-link float-right-link">Tickets</span></a>

            </div>

            <div class="col-sm-12 col-sm-6 col-md-8 col-lg-7 padding-left-0">
                <div class="menu_background">
                </div>
            </div>
            <span class="company_name">The XX</span>


            <div class="col-sm-12 col-sm-6 col-md-4 col-lg-5">
                <div class="menu_description">

                    <p>The xx is een driekoppige Engelse indieband, gevormd in Wandsworth, Londen in 2005. De drie brachten hun debuutalbum, xx, uit in augustus 2009. Het kwam op de eerste plaats van de "best of 2009"-lijst van The Guardian en op de tweede op die van NME.</p>

                </div>
            </div>

        </div>

        {{--Desktop View Ends--}}


        {{--Mobile View Starts--}}

        <div class="row mobile-view">

            <div class="mobile-icons">

                <a href={{url('/bravoure')}}>
                    <span class="mobile-b-icon">B</span>
                </a>

                <span class="mobile_menu_icon">
                    <img class="menu_icon_img" src="images/menu-icon.png"
                                                    width="20px"/>
                </span>

            </div>

            <div class="mobile_background_col col-sm-12 col-sm-12 col-md-12 col-lg-12 padding-left-20">
                <div class="menu_background_mobile">
                </div>
            </div>
            <span class="company_name_mobile">The XX</span>

            <div class="col-sm-12 col-sm-12 col-md-12 col-lg-12">
                <div class="padding_left_20 menu_description_mobile">

                    <p>The xx is een driekoppige Engelse indieband, gevormd in Wandsworth, Londen in 2005. De drie brachten hun debuutalbum, xx, uit in augustus 2009. Het kwam op de eerste plaats van de "best of 2009"-lijst van The Guardian en op de tweede op die van NME.</p>

                </div>

            </div>

            @include('bravoure/mobile-menu')

        </div>

        {{--Mobile View Ends--}}

    </div>

    @include('bravoure/artists2')

@endsection

<style>


    @font-face {
        font-family: Apercu Light;
        src: url('{{ url('fonts/Apercu-Light.otf') }}');
    }

    body {
        font-family: Apercu Light !important;
    }

    .menu_container {
        width: 100% !important;
    }

    a:hover {
        text-decoration-color: #F4A0A0 !important;
    }

    /*
    ** Deskot View
    ** This takes effect until the screen reaches below 900px
    */

    @media screen and (min-width: 900px) {

        .mobile-view {
            display: none;
        }

        #scrollable {
            overflow: auto;
            width:100%;
            height:100%;
            margin: 0px 0px 0px 50px;
        }

        a {
            color: white !important;
            text-decoration: none;
        }

        .desktop-links {
            position: absolute;
            z-index: 5;
            color: #FFF;
            width: 100%;
            margin-top: 15px;
            font-size: 22px;
            padding-left: 46px;
        }

        .inline-link {
            display: inline;
            padding-right: 43px;
        }

        .tickets-link {
            float: right;
            color: black;
            padding-right: 35px;
        }

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

        .menu_background {
            background-image: url(images/menu_background.png);
            background-size: 60vw;
            background-repeat: no-repeat;
            min-height: 100%;
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
            padding-left: 59px;
            margin-bottom: 33px;
        }

    }

    /*
    ** Mobile View
    ** This takes effect until the screen reaches above 900px
    */
    @media screen and (max-width: 900px) {

        .menu_icon_img {
            padding-top: 18px;
            width: 28px;
        }

        #scrollable {
            overflow: auto;
            width:100%;
            height:100%;
            margin: 0px 0px 0px 10px;
        }

        .more-info-container-col{
            display: none;

        }

        .menu_rectangle {
            display: none;
            z-index: 100;
            width: 60%;
            height: 100%;
            position: fixed;
            padding-top: 0px;
            top: 0;
            right: 0;
        }

        .menu_mobile_links_list {
            display: none;
            z-index: 200;
            position: fixed;
            top: 44px;
            right: 38px;
            font-size: 36px;
            line-height: 62px;
            text-align: right;
        }

        .menu_mobile_link {
            color: black;
        }

        .overlay {
            display: none;
            background-color: #000;
            bottom: 0;
            left: 0;
            opacity: 0.6;
            filter: alpha(opacity=50); /* IE7 & 8 */
            position: fixed;
            right: 0;
            top: 0;
            z-index: 99;
        }

        .desktop-view {
            display: none;
        }

        .mobile-b-icon {
            font-size: 31px;
            color: black;
            margin: 20px 14px;
            position: absolute;
        }

        .mobile-icons {
            position: absolute;
            width: 100%;
            z-index: 1;
        }

        .mobile_menu_icon {
            margin: 20px;
            display: block;
            height: 50px;
            width: 50px;
            float: right;
            -moz-border-radius: 30px; /* or 50% */
            border-radius: 30px; /* or 50% */
            background-color: white;
            color: white;
            text-align: center;
            font-size: 2em;
        }

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
            height: 71%;
        }

        .menu_description_mobile {
            padding-top: 20px;
            width: 90%;
            position: relative;
        }

        .padding_media {
            padding-left: 20px;
        }

        .padding_left_40 {
            padding-left: 40px !important;
        }

        .padding_left_20 {
            padding-left: 20px !important;
        }
    }

</style>
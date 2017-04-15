<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts/head')
</head>

<body>

<div class="container menu_container">

    <div class="row menu_background">
        <span class="company_name">The XX</span>
    </div>

</div>

@yield('content')

@include('layouts/footer')

</body>
</html>

<style>
    .menu_background {
        background-image: url(images/menu_background.png);
        background-size: contain;
        background-repeat: no-repeat;
        max-width: 905px;
        max-height: 709px;
    }

    .company_name {
        font-size: 20vw;
        color: #F4A0A0;
        float: right;
        padding-top: 187px;
        padding-right: 85px;    }

    .menu_container {
        padding: 0px;
        margin: 0px;
        width: 100%;
    }
</style>
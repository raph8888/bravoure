@extends('layouts.master')

@section('content')




    <div class="container">

        <div class="row">

            <h3>Upcoming Artists</h3>

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
    .img-responsive {
        margin: 0 auto;
    }
</style>
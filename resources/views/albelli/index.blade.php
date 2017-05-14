<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>


    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 20px 10px 10px 30px;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        /*.content {*/
            /*text-align: center;*/
        /*}*/

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<h1>Albelli Assigment</h1>

<form  id="testForm" method="post" class="form-horizontal" enctype='multipart/form-data'>

<div class="title">
    <label>Title</label><br>
    <input type="text" name="title" required />
</div>

<div class="content">
    <label>Content</label><br>
    <input type="text" name="content" required/>
</div>

<div class="image">
    <label>Image</label><br>
    <img id="blah" src="{{ url('images/albelli/default-placeholder.png') }}" alt="your image" />
    <input type="file" name="pic" class="pic_upload" accept="image/*" onchange="readURL(this);" required /><br>

</div>

<div class="email">
    <label>Email</label><br>
    <input type="email" name="email" required/>
</div>

<div class="submit">
<input type="submit" value="Submit">
</div>


    <img src="{{ url('images/albelli/balls_loading.gif') }}" id="gif" style="display: block; margin: 0 auto; width: 100px; visibility: hidden;">


    <input type="hidden" name="_token" value="{{ csrf_token() }}">

</form>

</body>


<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(300);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(function () {

        $('form').on('submit', function (e) {



            var formData = new FormData($("#testForm")[0]);
            var ft = $('.pic_upload')[0].files[0];
            formData.append("fileToUpload", ft);
            console.log(ft);
            console.log(formData);


            e.preventDefault();

            $('#gif').css('visibility', 'visible');

            $.ajax({
                type: 'post',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                url: './sendform',
                success: function () {
                    $('#gif').css('visibility', 'hidden');
                }
            });

        });

    });


</script>
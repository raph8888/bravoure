<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>


    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
          rel="stylesheet" type="text/css"/>
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

{{--<h1 style="text-align: center">Albelli Assigment</h1>--}}


<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-5 col-md-5">
        </div>
        <div class="col col-xs-12 col-sm-3 col-md-3">
            <h2>Fill me</h2>
            <br>
            <form id="testForm" method="post" class="form-horizontal" enctype='multipart/form-data'>
                <div class="title input-container">
                    <label>Recipient</label><br>
                    <input type="text" name="recipient" value="+31629058449" required/>
                </div>
                <div class="title input-container">
                    <label>Originator</label><br>
                    <input type="text" name="originator" value="MessageBird" required/>
                </div>
                <div class="content input-container">
                    <label>Message</label><br>
                    <textarea rows="4" cols="20" type="text" name="message" required>This is a test message.</textarea>
                </div>
                <br>
                <div class="submit">
                    <input type="submit" value="Submit">
                </div>
                <img src="{{ url('images/albelli/balls_loading.gif') }}" id="gif"
                     style="width: 80px; visibility: hidden;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
        <div class="col col-xs-12 col-sm-4 col-md-4">
        </div>
    </div>
</div>

</body>


<script>

    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>

    $(function () {
        $('form').on('submit', function (e) {
            var data = $('#testForm').serialize();
            console.log(data);
            e.preventDefault();
            $('#gif').css('visibility', 'visible');
            $.ajax({
                type: 'POST',
                data: data,
                url: './sendsms',
                success: function (data, status, jqXHR) {

                    if (data.success !== undefined && data.success == true) {
                        //stop loading animation
                        $('#gif').css('visibility', 'hidden');

                        return false;
                    }

                    // If we got here, something went wrong.
                    alert('Something went wrong and its probably Raphaels fault');
                    //stop loading animation
                    $('#gif').css('visibility', 'hidden');

                    console.log(data);

                    $('#gif').css('visibility', 'hidden');
                },
                error: function (jqXHR, status, errormsg) {
                    console.info(status + ':' + errormsg);
                    alert('Something went wrong and its probably Raphaels fault');
                    $('#gif').css('visibility', 'hidden');
                }
            });
        });
    });

</script>

<style>
    .input-container {
        margin-bottom: 20px;
    }
</style>
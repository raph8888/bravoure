<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Artist;

class Albelli extends Controller
{

    const EMAIL_OWNER = 'raph@raph-web.com';

    public $image_type = Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png');

    public function index()
    {
        return view('albelli/index');
    }

    public function form()
    {

        $title = Albelli::clean_input($_POST["title"]);
        $content = Albelli::clean_input($_POST["content"]);
        $image = Albelli::clean_input($_FILES["pic"]["name"]);
        $email = Albelli::clean_input($_POST["email"]);
        $date = date("Y-m-d | h:i:sa");

        var_dump($date);

        $myfile = fopen('title.txt', 'w') or die("Unable to open file!");
        fwrite($myfile, $title);
        fclose($myfile);

        $myfile = fopen('content.txt', 'w') or die("Unable to open file!");
        fwrite($myfile, $content);
        fclose($myfile);

        $myfile = fopen('email.txt', 'w') or die("Unable to open file!");
        fwrite($myfile, $email);
        fclose($myfile);

        $myfile = fopen('date.txt', 'w') or die("Unable to open file!");
        fwrite($myfile, $date);
        fclose($myfile);

//        file_put_contents($date . '.txt', $date);


        //store all the image extension types in array
        $type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png');

        //explode and find value after dot
        $ext = explode(".",$image);

        //check image extension not in the array $type
        if(!(in_array($ext[1],$type)))
        {
            var_dump('not cool');
        } else {
            var_dump('cool');
        }

        if ($email == Albelli::EMAIL_OWNER) {
            var_dump('cool');
        } else {
            var_dump('not cool');
        }

    }

    public function clean_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
}
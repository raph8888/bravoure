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

        var_dump($_POST);
        var_dump($_FILES);

        $title = Albelli::test_input($_POST["title"]);
        $content = Albelli::test_input($_POST["content"]);
        $image = Albelli::test_input($_FILES["pic"]["name"]);
        $email = Albelli::test_input($_POST["email"]);

        var_dump($title);
        var_dump($content);
        var_dump($image);
        var_dump($email);


        $type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png'); //store all the image extension types in array

        $ext = explode(".",$image); //explode and find value after dot

        if(!(in_array($ext[1],$type))) //check image extension not in the array $type
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

    public function test_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
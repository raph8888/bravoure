<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Artist;

class Bravoure extends Controller
{
    public function index()
    {

        $artists = Artist::all();

        return view('bravoure/index',
            [
                'artists' => $artists
            ]
        );
    }
}
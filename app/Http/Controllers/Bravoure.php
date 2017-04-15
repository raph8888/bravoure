<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Artist;

class Bravoure extends Controller
{
    public function index()
    {

        $artists = Artist::find(1)->get();

        return view('bravoure_index',
            [
                'artists' => $artists
            ]
        );
    }
}
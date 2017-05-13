<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Artist;

class Albelli extends Controller
{
    public function index()
    {
        return view('albelli/index');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function index(){

        $people = Person::with('creator')->get();

        return view('index',compact('people'));
    }
}

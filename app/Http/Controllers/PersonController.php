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

    public function show($personId){

        $person = Person::with('children','parents')->findOrFail($personId);


        return view('show',compact('person'));
    }

    public function create(Request $request){
        dd($request->all());
        $newPerson = $request->newPerson;
    }
}

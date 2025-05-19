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

    public function create(){
        return view('createPerson');
    }

     public function store(Request $request)
    {
        $person = new Person();


        $person->first_name =$request->input('first_name');
        $person->last_name =$request->input('last_name');
        $person->birth_name =$request->input('birth_name');
        $person->middle_names =$request->input('middle_names');
        $person->date_of_birth = $request->input('date_of_birth');

        $person->created_by = 1;

        $saved=$person->save();

        if(!$saved){

            return redirect()->route('index')->with('error', 'Erreur, la personne n\'a pas été créée.');
        }
        return redirect()->route('index')->with('success', 'Nouvelle personne créée.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


        $first_name =ucfirst(strtolower($request->input('first_name')));
        $last_name =strtoupper($request->input('last_name'));

        $birth_name = $request->input('birth_name');
        if(!empty($birth_name)) {
            $$birth_name = strtoupper($birth_name);
        } else {
            $middle_names = $last_name;
        }

        $middle_names = $request->input('middle_names');
        if(!empty($middle_names)) {
            $middle_names = ucwords($middle_names);
        } else {
            $middle_names = null;
        }

        $date_of_birth = $request->input('date_of_birth');


        if(!isset($date_of_birth)){
            $date_of_birth=null;
        }

        $person->first_name =$first_name;
        $person->last_name =$last_name;
        $person->birth_name =$birth_name;
        $person->middle_names =$middle_names;
        $person->date_of_birth=$date_of_birth;
        $person->created_by = Auth::id();

        $saved=$person->save();

        if(!$saved){

            return redirect()->route('index')->with('error', 'Erreur, la personne n\'a pas été créée.');
        }
        return redirect()->route('index')->with('success', 'Nouvelle personne créée.');
    }
}

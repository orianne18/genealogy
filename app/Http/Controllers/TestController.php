<?php

namespace App\Http\Controllers;

use App\Models\Person;
use DB;

class TestController extends Controller
{
    public function index(){

        $people = Person::with('creator')->get();

        return view('index',compact('people'));
    }

    public function testDegree(){
        DB::enableQueryLog();
        $timestart = microtime(true);
        $person = Person::findOrFail(1536);
        $degree = $person->getDegreeWith(1);
        // afficher le rÃ©sultat, le temps d'execution, et le nombre de requÃªtes SQL :
        var_dump(["degree"=>$degree, "time"=>microtime(true)-$timestart, "nb_queries"=>count(DB::getQueryLog())]);
    }
}

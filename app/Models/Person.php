<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Person extends Model
{

    protected $fillable = [
    'created_by',
    'first_name',
    'last_name',
    'birth_name',
    'middle_names',
    'date_of_birth',

];

    public function children(): BelongsToMany{
        return $this->belongsToMany(Person::class,'relationships','parent_id','child_id');
    }
    public function parents(): BelongsToMany{
        return $this->belongsToMany(Person::class,'relationships','child_id','parent_id');
    }

    public function creator(): BelongsTo{
        return $this->belongsTo(Person::class,'created_by');
    }


    public function findDegree(Person $actual, Person $target,int $degree,  array $visited ){

        if($actual === $target){
            return $degree;
        }

        $actualParents=$actual->parents();
        $actualChildren=$actual->children();

        foreach($actualParents as $actualParent){
            if(in_array($actualParent,$visited)) continue;
            array_push($visited,$actualParent);
            $foundDegree = $this->findDegree($actualParent,$target,$degree+1,$visited);
            if ($foundDegree !== null) {
                return $foundDegree;
            }

        }
        foreach($actualChildren as $actualChild){
            if(in_array($actualChild,$visited)) continue;
            array_push($visited,$actualChild);
            $foundDegree = $this->findDegree($actualChild,$target,$degree+1,$visited);
            if ($foundDegree !== null) {
                return $foundDegree;
            }
        }

        return null;

    }

    public function getDegreeWith(Person $target_person_with){
        $degree=0;

        $visited = [];


        return findDegree($this,$target_person_with,0,$visited);

    }


}

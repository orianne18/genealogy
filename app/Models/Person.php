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

        if($degree > 25){
            return null;
        }

        if($actual->id === $target->id){
            return $degree;
        }

        $visited[] = $actual->id;

        $actualParents=$actual->parents()->get();
        foreach($actualParents as $actualParent){

            if(in_array($actualParent->id,$visited, true)) continue;
            $foundDegree = $this->findDegree($actualParent, $target, $degree + 1, $visited);
            if ($foundDegree !== null) {
                return $foundDegree;
            }

        }


        $actualChildren=$actual->children()->get();
        foreach($actualChildren as $actualChild){

            if(in_array($actualChild->id,$visited, true)) continue;
            $foundDegree = $this->findDegree($actualChild, $target, $degree + 1, $visited);
            if ($foundDegree !== null) {
                return $foundDegree;
            }
        }

        return null;

    }

    public function getDegreeWith(int $targetId){
        $degree=0;

        $target = Person::findOrFail($targetId);
        $visited = [];

        $foundDegree =  $this->findDegree($this,$target,$degree,$visited);

        if ($foundDegree === null) return false;
        return $foundDegree;

    }


}

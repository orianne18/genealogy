<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Person extends Model
{


    public function children(): BelongsToMany{
        return $this->belongsToMany(Person::class,'relationships','parent_id','child_id');
    }
    public function parents(): BelongsToMany{
        return $this->belongsToMany(Person::class,'relationships','child_id','parent_id');
    }

    public function creator(): BelongsTo{
        return $this->belongsTo(Person::class,'created_by');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * An array of strings (property names) that can be mass-assigned
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];

    /**
     * A Room has Many Items
     *
     * @return mixed
     */
    public function items(){
        return $this->hasMany(Item::class);
    }

}

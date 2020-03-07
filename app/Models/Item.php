<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * An array of strings (property names) that can be mass-assigned
     *
     * @var array
     */
    protected $fillable = ['room_id', 'name', 'description', 'image', 'quantity', 'status'];


    /**
     * An Item belongs to a Room
     *
     * @return mixed
     */
    public function room(){
        return $this->belongsTo(Room::class);
    }
}

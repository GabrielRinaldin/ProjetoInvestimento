<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;



/**
 * Class Group.
 *
 * @package namespace App\Entities;
 */
class Group extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'instituition_id'];
    
    public function getTotalValueAttribute()
    {   
        return $this->moviments->sum('value');
    }
    
    public $timestamps = true;


    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function instituition()
    {
        return $this->belongsTo(Instituition::class);
    }

    public function users()
    {
           return $this->belongsToMany(User::class, 'user_groups');
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }

}
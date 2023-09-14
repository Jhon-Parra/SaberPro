<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Multimedia
 *
 * @property $id
 * @property $name
 * @property $type
 * @property $created_at
 * @property $updated_at
 * @property $file
 * @property $Url
 *
 * @property Answer[] $answers
 * @property Multimediaquestion[] $multimediaquestions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Multimedia extends Model
{
    
    static $rules = [
		'name' => 'required',
		'type' => 'required',
		'Url' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','type','file','Url'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'multimedia_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function multimediaquestions()
    {
        return $this->hasMany('App\Models\Multimediaquestion', 'multimedia_id', 'id');
    }
    
    
    public function multimedia()
    {
        return $this->belongsTo(Multimedia::class, 'multimedia_id');
    }
    

}

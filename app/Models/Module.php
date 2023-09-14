<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Module
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $name
 * @property $description
 * @property $competency
 * @property $author
 *
 * @property Competency $competency
 * @property Question[] $questions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Module extends Model
{
    
    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'competency' => 'required',
		'author' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','competency','author'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function competency()
    {
        return $this->hasOne('App\Models\Competency', 'id', 'competency');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'module_id', 'id');
    }
    

}

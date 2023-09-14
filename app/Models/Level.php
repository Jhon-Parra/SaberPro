<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Level
 *
 * @property $id
 * @property $number
 * @property $name
 * @property $minpoints
 * @property $created_at
 * @property $updated_at
 *
 * @property Progress[] $progress
 * @property Question[] $questions
 * @property User[] $users
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Level extends Model
{

    static $rules = [
		'number' => 'required',
		'name' => 'required',
		'minpoints' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['number','name','minpoints'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function progress()
    {
        return $this->hasMany('App\Models\Progress', 'level_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'level', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'level', 'id');
    }


}

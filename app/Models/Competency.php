<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Competency
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $backgroundImageUrl
 * @property $imageUrl
 * @property $faculty
 * @property $created_at
 * @property $updated_at
 *
 * @property Faculty $faculty
 * @property Module[] $modules
 * @property Progress[] $progress
 * @property Question[] $questions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Competency extends Model
{



    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','backgroundImageUrl','imageUrl','faculty'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany('App\Models\Module', 'competency', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function progress()
    {
        return $this->hasMany('App\Models\Progress', 'competencia_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {

        return $this->hasMany('App\Models\Question', 'competency', 'id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }



}

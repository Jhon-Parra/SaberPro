<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Multimediaquestion
 *
 * @property $id
 * @property $question_id
 * @property $multimedia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Multimedia $multimedia
 * @property Question $question
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */


class Multimediaquestion extends Model
{

    static $rules = [
		'question_id' => 'required',
		'multimedia_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['question_id','multimedia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function multimedia()
    {
        return $this->hasOne('App\Models\Multimedia', 'id', 'multimedia_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function question()
    {
        return $this->hasOne('App\Models\Question', 'id', 'question_id');
    }



}

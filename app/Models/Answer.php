<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 *
 * @property $id
 * @property $data
 * @property $percentage
 * @property $result
 * @property $question_id
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 * @property $imageUrl
 *
 * @property Question $question
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Answer extends Model
{
    
    static $rules = [
		'result' => 'required',
		'question_id' => 'required',
		'imageUrl' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['data','percentage','result','question_id','user_id','imageUrl'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function question()
    {
        return $this->hasOne('App\Models\Question', 'id', 'question_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}

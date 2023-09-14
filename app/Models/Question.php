<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'statement', 'statementtwo', 'level_id', 'module_id', 'competency_id', 'author_id',
        'type', 'points', 'typefile', 'url',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function competency()
    {
        return $this->belongsTo(Competency::class, 'competency_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }

    public function relatedAnswers()
    {
        return $this->answers;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswerOption extends Model
{
    use HasFactory;
    protected $primaryKey = 'quiz_answer_option_id';
}

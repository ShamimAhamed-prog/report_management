<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTypeModel extends Model
{
    use HasFactory;
    protected $table ='question_type';
    protected $fillable = [
        'id', 'name','soft_delete', 'deleted_at', 'deleted_by', 'created_at', 'created_by', 'updated_at', 'updated_by'
    ];
}

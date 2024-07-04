<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PositionModel extends Model
{
    // use SoftDeletes;
    use HasFactory;
    protected $table ='position';
    protected $fillable = [
        'id', 'name','soft_delete', 'deleted_at', 'deleted_by', 'created_at', 'created_by', 'updated_at', 'updated_by'
    ];
}

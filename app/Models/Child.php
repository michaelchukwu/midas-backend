<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'class',
        'technology'
    ];
    public function parent()
    {
        return $this->belongsTo(ParentModel::class, 'parent_id', 'id');
    }
}

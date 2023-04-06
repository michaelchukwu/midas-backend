<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    protected $table = 'parents';
    use HasFactory;

    public function children()
    {
        return $this->hasMany(Child::class, 'parent_id', 'id');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'player', 'id');
    }
}

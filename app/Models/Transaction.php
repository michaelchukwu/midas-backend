<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference',
        'type',
        'status',
        'amount',
        'note',
        'player'
    ];

    public function parent()
    {
        return $this->belongsTo(ParentModel::class, 'player', 'id');
    }
    public function getRouteKeyName() {
        return 'reference';
    }
}

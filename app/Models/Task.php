<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'assigned_by_id',
        'assigned_to_id',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'assigned_by_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }
}

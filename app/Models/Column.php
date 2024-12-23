<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    protected $fillable = ['board_id', 'title', 'position'];

    // Relacija sa Board modelom
    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    // Relacija sa Task modelom
    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('position');
    }
}

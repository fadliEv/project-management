<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'name', 'description', 'due_date', 'status'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

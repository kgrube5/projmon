<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'projects_id',
        'creator_id',
        'assignee_id',
        'title',
        'description',
        'type_id',
        'progress_id',
        'priority_id',
        'tags',
        'est_duration'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    
}

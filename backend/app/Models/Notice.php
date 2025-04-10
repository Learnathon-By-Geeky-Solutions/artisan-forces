<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Notice extends Model
{
    /** @use HasFactory<\Database\Factories\NoticeFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'department_id',
        'published_by',
        'published_at',
        'archived_at',
        'file',
    ];


    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'published_by');
    }

    public function approvedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'notice_user', 'notice_id', 'user_id')
            ->withPivot('is_approved')
            ->withTimestamps();
    }

  
}

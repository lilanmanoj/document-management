<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'disk',
        'path',
        'url',
        'user_id',
    ];

    /**
     * Fetch tags attached to the file.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

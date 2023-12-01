<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'type', 'content'];

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'type' => $this->type,
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}

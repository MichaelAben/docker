<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        self::updating(function(Post $post) {
            $postLog = ModelLog::create([
                'user_id' => empty($user = Auth::user()) ? null : $user->id,
                'action' => 'updating',
                'before' => serialize($post->original),
                'after' => serialize($post->attributes),
            ]);
        });

        self::creating(function(Post $post) {
            $postLog = ModelLog::create([
                'user_id' => empty($user = Auth::user()) ? null : $user->id,
                'action' => 'creating',
                'before' => serialize($post->original),
                'after' => serialize($post->attributes),
            ]);
        });
    }
}

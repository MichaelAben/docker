<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelLog extends Model
{
    protected $fillable = [
        'user_id', 'logable_model', 'logable_id', 'action', 'before', 'after',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getObject()
    {
        return {$this->getAttribute('logable_model')}::find($this->getAttribute('logable_id'));
    }
}

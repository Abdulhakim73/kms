<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReverseRequest extends Model
{
    use HasFactory;

    protected $table = 'reverse_requests';
    protected $fillable = [
        'type',
        'file',
        'image',
        'message',
        'user_id',
        'request_id'
    ];

    public function request ():BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
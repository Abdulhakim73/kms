<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Request extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_RESOLVE = 'resolve';
    const STATUS_REJECT = 'reject';

    const TYPE_CREATE = 'create';
    const TYPE_DELETE = 'delete';
    const TYPE_REFRESH_EXPIRY = 'refresh_expiry';

    protected $table = 'requests';

    protected $fillable = [
        'file_name',
        'type',
        'status',
        'petition_text',
        'device_id',
        'operator_id',
        'client_id',
        'branch_user_id',
        'user_id',
        'request',
        'container',
        'password',
        'cng',
        'refresh',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    protected $table = 'certificates';

    protected $fillable = [
        'cert_from',
        'cert_to',
        'status',
        'file_name',
        'req_id',
        'branch_user_id',
        'operator_id',
        'client_id',
        'user_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}

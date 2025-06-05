<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'domain_name',
        'registrar',
        'status',
        'registration_date',
        'expiry_date',
        'renewal_date',
        'auto_renew',
        'price',
        'nameserver1',
        'nameserver2',
        'nameserver3',
        'nameserver4',
        'dns_records',
        'settings',
    ];

    protected $casts = [
        'registration_date' => 'date',
        'expiry_date' => 'date',
        'renewal_date' => 'date',
        'auto_renew' => 'boolean',
        'price' => 'decimal:2',
        'dns_records' => 'array',
        'settings' => 'array',
    ];

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    public function isExpired()
    {
        return $this->expiry_date->isPast();
    }
    public function daysUntilExpiry()
    {
        return now()->diffInDays($this->expiry_date, false);
    }

    public function shouldRenew()
    {
        return $this->auto_renew && $this->daysUntilExpiry() <= 30;
    }
}

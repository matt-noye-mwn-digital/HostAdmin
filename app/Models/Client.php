<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];

    public function clientUser(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'client_id', 'id');
    }

    public function getStatus(){
        return match(strtolower($this->status)){
            'active' => '<span class="badge text-bg-success">Active</span>',
            'inactive' => '<span class="badge text-bg-secondary">Inactive</span>',
            'suspended' => '<span class="badge text-bg-danger">Suspended</span>',
            'pending' => '<span class="badge text-bg-warning">Pending</span>',
            'closed' => '<span class="badge text-bg-dark">Closed</span>',
        };
    }
}

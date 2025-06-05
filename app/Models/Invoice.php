<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];


    public function invoiceItems(){
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function getStatus(){
        return match($this->status){
            'draft' => '<span class="badge text-bg-primary">Draft</span>',
            'unpaid' => '<span class="badge text-bg-warning">Unpaid</span>',
            'paid' => '<span class="badge text-bg-success">Paid</span>',
            'cancelled' => '<span class="badge text-bg-info">Cancelled</span>',
            'refunded' => '<span class="badge text-bg-light">Refunded</span>',
            'collections' => '<span class="badge text-bg-danger">Collections</span>',
            'payment pending' => '<span class="badge text-bg-warning">Payment Pending</span>',
            'overdue' => '<span class="badge text-bg-danger">Overdue</span>',
            'sent' => '<span class="badge text-bg-dark">Sent</span>',

        };
    }
}

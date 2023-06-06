<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory, HasUlids;
    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'total',
        'payment_id',
    ];
    public function user_id()
    {
        return $this->belongsTo(User::class);
    }
    public function payment_id()
    {
        return $this->belongsTo(Payment::class);
    }
}

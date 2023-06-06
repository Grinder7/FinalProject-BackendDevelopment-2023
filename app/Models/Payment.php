<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory, HasUlids;
    protected $primaryKey = 'id';
    protected $guarded = [
        'id'
    ];
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'email',
        'address',
        'address2',
        'state',
        'city',
        'zip',
        'remember_detail'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = [
        'name',
        'price',
        'img',
    ];
    protected $primaryKey = "uuid";
    protected $guarded = [
        'uuid'
    ];
    public $timestamps = false;

    public function cover(): Attribute
    {
        return Attribute::make(
            get: fn ($img) => config('catalogue.img_dir') . '/' . $img
        );
    }
}

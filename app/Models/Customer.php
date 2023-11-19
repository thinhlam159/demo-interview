<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['name', 'description'];

    protected $table = 'customers';

    public $timestamps;
}

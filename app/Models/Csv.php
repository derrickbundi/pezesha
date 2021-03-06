<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csv extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $dates = ['invoice_date'];
}

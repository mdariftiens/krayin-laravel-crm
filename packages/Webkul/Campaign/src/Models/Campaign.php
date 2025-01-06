<?php

namespace Webkul\Campaign\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'type',
        'description',
        'message',
        'status',
        'start_date',
        'end_date',
        'package_id',
        'budget',
        'updated_at',
        'created_at'
    ];
}

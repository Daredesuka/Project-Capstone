<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function Response()
    {
        return $this->hasOne(Response::class, 'report_id', 'id');
    }
}
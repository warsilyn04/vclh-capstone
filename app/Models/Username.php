<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Username extends Model
{
    use HasFactory;

    protected $table = 'users';
    public $primaryKey = 'id';
    public $timestamp = true;

    public function transactions() {
        return $this->hasMany('App\Models\Transaction');
    }
}
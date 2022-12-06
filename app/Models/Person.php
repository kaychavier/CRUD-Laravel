<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'img',
        'type',
        'email',
        'cpf',
        'password',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

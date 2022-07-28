<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['address', 'number', 'complement', 'zipcode', 'city', 'state'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}

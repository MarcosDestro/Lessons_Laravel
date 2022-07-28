<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $primaryKey = 'id';

    public $timestamps = true;

    // Campos aceitos na inserção de dados
    protected $fillable = ['title', 'subtitle', 'description'];

    // Campos protegidos na inserção de dados
    protected $guarded = [];

    // Renomear as colunas de timestamps
    // public const CREATED_AT = 'creation_date';
	// public const UPDATED_AT = 'last_update';
}

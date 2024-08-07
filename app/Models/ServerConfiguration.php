<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerConfiguration extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'host', 'username', 'password', 'encryption', 'port', 'logo_url'];
}

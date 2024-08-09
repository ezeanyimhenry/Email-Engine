<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipient',
        'subject',
        'variables',
        'status',
        'template_id',
    ];

    public function template()
    {
        return $this->belongsTo(EmailTemplate::class);
    }
}

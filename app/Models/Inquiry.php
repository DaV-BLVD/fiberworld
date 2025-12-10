<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    // If your table name is different, uncomment the next line
    // protected $table = 'contact_inquiries';

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'service_type',
        'message',
        'status'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'contact_id'
    ];
    public $timestamps = false;

    public function contactEmail() {
        return $this->belongsTo(Contact::class);
    }
}

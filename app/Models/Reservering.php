<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservering extends Model
{
    use HasFactory;

    protected $fillable = ['voornaam', 'achternaam', 'email', 'telefoon', 'datum', 'tijd', 'aant_personen'];
}

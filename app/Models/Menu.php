<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['naam', 'beschrijving', 'categorie_naam', 'prijs', 'foto', 'pikant', 'vega'];

    public function menu_item()
    {
        return $this->belongsTo(Categorie::class);
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    // Añade los campos que son asignables masivamente
    protected $fillable = [
        'type', 
        'location', 
        'planting_date', 
        'area_size', 
        'estimated_yield'
    ];
}


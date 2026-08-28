<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['title', 'description', 'user_id', 'assigned_to', 'category_id', 'status', 'priority'])]

class Ticket extends Model
{
    // Uso de SoftDeletes para permitir la eliminación suave de tickets
    use SoftDeletes;

    // El usuario que reporta el ticket
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // La categoría del ticket
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // El técnico al que se le asignó el ticket
    public function assignedTech()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}

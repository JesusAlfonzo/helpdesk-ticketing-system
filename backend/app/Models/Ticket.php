<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['title', 'description', 'user_id', 'assigned_to', 'category_id', 'status', 'priority'])]

class Ticket extends Model
{
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
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}

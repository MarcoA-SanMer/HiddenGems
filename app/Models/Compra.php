<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Comprador;

class Compra extends Model
{
    use HasFactory;

    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(Comprador::class);
    }
}

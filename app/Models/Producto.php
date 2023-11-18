<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendedor;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $primaryKey = 'Id_producto';
    use HasFactory;

    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(vendedor::class);
    }
}

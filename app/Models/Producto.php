<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendedor;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Compra;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;
    use SoftDeletes;

    public function vendedores(): BelongsToMany
    {
        return $this->belongsToMany(vendedor::class);
    }

    public function compras(): HasMany
    {
        return $this->hasMany(Compra::class);
    }
}

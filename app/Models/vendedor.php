<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Relations\HasMany;

class vendedor extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productos(): Hasmany
    {
        return $this->hasMany(Producto::class);
    }

}

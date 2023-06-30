<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'type_id',
        'name',
        'about',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

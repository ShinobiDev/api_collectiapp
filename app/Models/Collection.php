<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = ['name','category_id','author_id','type_id','editorial_id','number_of_volumes'];

    /**
     * La colección a qué tipo pertenece.
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * La colección a qué editorial pertenece.
     */
    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }

    /**
     * La colección a qué género pertenece.
     */
    public function genders()
    {
        return $this->belongsToMany(Gender::class);
    }

    /**
     * La colección a qué autor pertenece.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}


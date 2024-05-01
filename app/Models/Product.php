<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'cost',
        'discount',
        'created_by',
        'updated_by',
        'deleted_at'
    ];

    /**
     * 
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the options for the product.
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}

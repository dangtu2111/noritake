<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRelationship extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_relationships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'child_id'];

    /**
     * Get the parent product that this relationship belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id', 'id');
    }

    /**
     * Get the child product that this relationship refers to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function child()
    {
        return $this->belongsTo(Product::class, 'child_id', 'id');
    }
}
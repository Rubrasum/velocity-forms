<?php

namespace Rubrasum\VelocityForms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VelocityObject extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'velocity_objects';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship to the parent object (usually a form).
     * Each object may have a parent (e.g., a form).
     */
    public function parent()
    {
        return $this->belongsTo(VelocityForm::class, 'parent_id');
    }

    /**
     * Polymorphic relationship for different object types (form, field, action).
     */
    public function object()
    {
        return $this->morphTo();
    }
}

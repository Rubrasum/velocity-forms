<?php

namespace Rubrasum\VelocityForms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VelocityRelationship extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'velocity_relationships';

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
     * Each relationship has a parent object.
     */
    public function parent()
    {
        return $this->belongsTo(VelocityObject::class, 'parent_object_id');
    }

    /**
     * Relationship to the child object (e.g., a submission).
     * Each relationship has a child object.
     */
    public function child()
    {
        return $this->belongsTo(VelocityObject::class, 'child_object_id');
    }
}

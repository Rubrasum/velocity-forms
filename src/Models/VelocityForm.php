<?php

namespace Rubrasum\VelocityForms\Models;

namespace Rubrasum\VelocityForms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VelocityForm extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'velocity_forms';

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
     * If you have a related submissions table, define the relationship.
     * Assuming you have a `VelocityFormSubmission` model.
     */
    public function submissions()
    {
        return $this->hasMany(VelocityFormSubmission::class, 'form_id');
    }
}

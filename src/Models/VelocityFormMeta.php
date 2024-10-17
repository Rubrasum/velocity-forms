<?php

namespace Rubrasum\VelocityForms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VelocityFormMeta extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_metas';

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
        'value' => 'json', // If value contains JSON, cast it automatically
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship to the `VelocityForm` model.
     * Each form meta belongs to a form.
     */
    public function form()
    {
        return $this->belongsTo(VelocityForm::class, 'parent_id');
    }
}

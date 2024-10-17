<?php

namespace Rubrasum\VelocityForms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VelocitySubmissionMeta extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'velocity_submission_meta';

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
     * Relationship to the `VelocitySubmission` model.
     * Each meta entry belongs to a submission.
     */
    public function submission()
    {
        return $this->belongsTo(VelocitySubmission::class, 'parent_id');
    }
}

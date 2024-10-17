<?php

namespace Rubrasum\VelocityForms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VelocitySubmission extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'velocity_submissions';

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
     * Relationship to the `VelocityForm` model.
     * Each submission belongs to a form.
     */
    public function form()
    {
        return $this->belongsTo(VelocityForm::class, 'form_id');
    }

    /**
     * Relationship to the `User` model.
     * Each submission may belong to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

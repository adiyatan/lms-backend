<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'speaker_id',
        'name',
        'description',
        'group_link',
        'schedule',
    ];

    /**
     * Get the speaker that owns the module.
     */
    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }
}

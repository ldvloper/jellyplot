<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sample extends Model
{
    use HasFactory;

    //Fillable
    protected $fillable = [
        'code',
        'project_id',
    ];

    //Appends
    protected $appends = [
        'public_qr_url'
    ];

    /**
     * @return string
     */
    public function getPublicQrUrlAttribute(): string
    {
        //Path: (qr/project_name/sample_code)
        return '/qr/'.$this->project_id.'/'.$this->code.'.png';
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo('projects', 'project_id');
    }
}

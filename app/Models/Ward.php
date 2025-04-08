<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'wards';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected function districts()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }
}


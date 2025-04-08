<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    protected $casts = [
        'province_code' => 'string',
    ];

    protected $fillable = [
        'name',
    ];
    protected $primaryKey = 'code'; 

    public function province()
    {
        return $this->belongsTo(Provice::class, 'province_code', 'code');
    }
    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_code', 'code');
    }
}

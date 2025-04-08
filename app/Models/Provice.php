<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provice extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'provinces';
    protected $primaryKey = 'code';
    public $incrementing = false; 
    protected $keyType = 'string';
    protected $casts = [
        'code' => 'string',
    ];
    
    protected $fillable = [
        'name', 
    ];
    public function districts()
    {
        return $this->hasMany(District::class, 'province_code', 'code');
    }
    // public function wards()
    // {
    //     return $this->beLongTo(Ward::class, 'province_id');
    // }
}

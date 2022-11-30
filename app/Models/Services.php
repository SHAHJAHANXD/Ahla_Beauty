<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',    'name',    'date', 'distance_cost', 'availablity', 'start_time', 'end_time', 'description', 'category'];
    public function Optional()
    {
        return $this->hasMany(Optional::class, 'service_id', 'id');
    }
    public function Required()
    {
        return $this->hasMany(Required::class, 'service_id', 'id');
    }
    public function Images()
    {
        return $this->hasMany(OtherImages::class, 'service_id', 'id');
    }
}

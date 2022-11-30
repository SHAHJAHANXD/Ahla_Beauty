<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'price', 'discount', 'publish_date', 'expiry_date', 'description'];
    public function Optional()
    {
        return $this->hasMany(Optional::class, 'package_id', 'id');
    }
    public function Required()
    {
        return $this->hasMany(Required::class, 'package_id', 'id');
    }
    public function Images()
    {
        return $this->hasMany(OtherImages::class, 'package_id', 'id');
    }
}

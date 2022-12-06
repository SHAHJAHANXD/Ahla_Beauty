<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'image', 'title', 'discount', 'description', 'publish_date', 'expiry_date', 'category'];
    public function Category()
    {
        return $this->hasMany(OfferCategory::class, 'offer_id', 'id');
    }
}

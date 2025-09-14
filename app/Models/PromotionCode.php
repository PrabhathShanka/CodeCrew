<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'promo_code',
        'discount_percentage',
        'expiry_date',
        'status',
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'promotion_code_user');
    }
}

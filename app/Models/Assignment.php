<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
        use HasFactory;

    protected $fillable = [
        'user_id',
        'promotion_code_id',
        'subject',
        'deadline',
        'contact_type',
        'contact_info',
        'description',
        'attachment',
        'price',
        'status',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promotionCode()
    {
        return $this->belongsTo(PromotionCode::class);
    }

}

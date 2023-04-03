<?php

namespace App\Modules\HomePage\Banner\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;
    protected $table = 'home_banners';

    protected $fillable = [
        'title',
        'sub_title',
        'image',
    ];

    public $image_path = 'home_banners';
}

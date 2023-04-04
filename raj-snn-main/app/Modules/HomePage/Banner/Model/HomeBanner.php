<?php

namespace App\Modules\HomePage\Banner\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class HomeBanner extends Model
{
    use HasFactory;
    protected $table = 'home_banners';

    protected $fillable = [
        'title',
        'sub_title',
        'image',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $appends = ['image_link'];

    public $image_path = 'home_banners';

    protected function imageLink(): Attribute
    {
        return new Attribute(
            get: fn () => asset('storage/'.$this->image_path.'/'.$this->image),
        );
    }
}

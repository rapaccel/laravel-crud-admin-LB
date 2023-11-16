<?php

namespace App\Models;

use App\Models\kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class blog extends Model
{
    use HasFactory;
    protected $with=['kategori'];
    protected $guarded=['id'];
    public function kategori(){
    return $this->belongsTo(kategori::class,'kategori_id');}
    
    public function getThumbnailUrlAttribute()
    
{
    return asset($this->thumbnail);
}
    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn ($thumbnail) => asset('/storage/' . $thumbnail),
        );
    }
}

<?php

namespace App\Models;

use App\Models\blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function blogs(){
    return $this->hasMany(blog::class);
    }
}

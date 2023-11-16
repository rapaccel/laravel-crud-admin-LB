<?php

namespace App\Models;

use App\Models\fitur;
use App\Models\price;
use App\Models\unggul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class service extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    public function fiturs(){
    return $this->hasMany(fitur::class);
    }
    public function prices(){
        return $this->hasMany(price::class);
        }
    public function ungguls(){
        return $this->hasMany(unggul::class);
        }
}

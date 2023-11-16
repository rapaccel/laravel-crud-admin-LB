<?php

namespace App\Models;

use App\Models\service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class fitur extends Model
{
    use HasFactory;
    protected $with=['service'];
    protected $guarded=['id'];
    public function service(){
    return $this->belongsTo(service::class,'service_id');}
}

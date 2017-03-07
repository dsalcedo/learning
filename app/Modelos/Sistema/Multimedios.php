<?php

namespace App\Modelos\Sistema;

use Illuminate\Database\Eloquent\Model;

class Multimedios extends Model
{
    protected $table = 'multimedios';
    protected $fillable = [
        'tipo',
        'nombre',
        'media'
    ];

    public function getLink()
    {
        return '/multimedia/'.$this->media;
    }
}

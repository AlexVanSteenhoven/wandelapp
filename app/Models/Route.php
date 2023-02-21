<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';

    protected $fillable = [
      'cuid',
      'filename',
      'xml_data',
      'geo_json',
      'filesize'
    ];
}

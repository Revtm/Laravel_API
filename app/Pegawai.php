<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
  protected $table = 'pegawai';
  protected $primaryKey = 'id_pegawai';
}

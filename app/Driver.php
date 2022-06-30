<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //ini nama table
    protected $table = 'tb_driver';
    //ini primaryKey
    protected $primaryKey = 'id_driver';
    //ini nama field
    protected $fillable =  array ('nama_driver','data_file','tgl','harga_driver','deskripsi_driver' );


 


}

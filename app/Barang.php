<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //ini nama table
    protected $table = 'tb_barang';
    //ini primaryKey
    protected $primaryKey = 'id_barang';
    //ini nama field
    protected $fillable =  array ('nama_barang','data_file','tgl','harga','deskripsi_barang' );


 


}

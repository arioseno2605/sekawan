<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Booking extends Model
{
        //ini nama table
        protected $table = 'tb_sewa';
        //ini primaryKey
        protected $primaryKey = 'kode_sewa';
         //ini nama field
        protected $fillable = array ('tanggal_order', 'durasi', 'nama_penyewa', 'id_barang', 'id_driver', 'status');

}

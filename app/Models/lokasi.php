<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    protected $table = "lokasi";
    public $timestamps = false;
    protected $primaryKey = "id_lokasi";


    protected $fillable = [
        'id_lokasi', 
        'provinsi',
        'nama',
        'id_invoice',
        ];  
        
    public function tbl_invoice(){
        return $this->belongsTo('App\Models\invoice', 'id_invoice');
    }
}

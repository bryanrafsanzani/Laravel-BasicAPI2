<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoice";
    public $timestamps = false;
    protected $primaryKey = "id_invoice";


    protected $fillable = [
        'id_invoice', 
        'nama',
        'harga', 
        'kapasitas', 
        ];  
    
    public function tbl_lokasi(){
        return $this->hasMany('App\Models\lokasi', 'id_invoice');
    }

    
}


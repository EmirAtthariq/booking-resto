<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'res_date', 
        'tel_number',
        'table_id',
        'guest_number'
    ];

    protected $casts = [
        'res_date' => 'datetime'
    ];

    public function table(){
        return $this->belongsTo(Table::class);
    }
}

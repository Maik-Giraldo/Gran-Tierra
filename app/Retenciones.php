<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class Factura extends Model
{
    use Sortable;
    protected $table = 'seguimiento_transaccional';
    protected $primaryKey = 'id';
    public $sortable = [
        'id',
        'he',
        'ica',
        'iva',
        'rtf',
        'rete_ica',
        'vlr_neto'
    ];

    protected $fillable = [
        'id',
        'he',
        'ica',
        'iva',
        'rtf',
        'rete_ica',
        'vlr_neto'
        
    ];
}
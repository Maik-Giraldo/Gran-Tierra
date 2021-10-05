<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class HojaEntrada extends Model
{
    use Sortable;
    protected $table = 'hoja_entrada';
    protected $primaryKey = 'id';
    public $sortable = [
        'id',
        'id_transaccion',
        'he',
        'valor_he',
        'aprobado',
        'fra',
        'valor_fra',
        'fecha_rec',
        'vencimiento2',
        'fecha_apr',
        'retencines',
        'fecha_pago',
        'valor_neto',
        'vlr_factura',
        'ica',
        'iva',
        'rtf',
        'rtn_municipal',
        'vlr_neto'
    ]; 

    protected $fillable = [
        'id',
        'id_transaccion',
        'he',
        'valor_he',
        'aprobado',
        'fra',
        'valor_fra',
        'fecha_rec',
        'vencimiento2',
        'fecha_apr',
        'retencines',
        'fecha_pago',
        'valor_neto',
        'vlr_factura',
        'ica',
        'iva',
        'rtf',
        'rtn_municipal',
        'vlr_neto'
    ];
}
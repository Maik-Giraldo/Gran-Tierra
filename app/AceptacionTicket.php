<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class AceptacionTicket extends Model
{
    use Sortable;
    protected $table = 'aceptacion_ticket';
    protected $primaryKey = 'id';
    public $sortable = [
        'id',
        'Nit',
        'name',
        'administrador_contrato',
        'hoja_entrada',
        'valor_ticket',
    ]; 

    protected $fillable = [
        'id',
        'Nit',
        'name',
        'administrador_contrato',
        'hoja_entrada',
        'valor_ticket',
    ];
    public $timestamps = false;
}
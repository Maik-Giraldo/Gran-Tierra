<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class FilesAceptacionTicket extends Model
{
    use Sortable;
    protected $table = 'files_aceptacion_ticket';
    protected $primaryKey = 'id';
    public $sortable = [
        'id',
        'nombre',
        'Nit',
    ]; 

    protected $fillable = [
        'id',
        'nombre',
        'Nit',
    ];
    public $timestamps = false;
}
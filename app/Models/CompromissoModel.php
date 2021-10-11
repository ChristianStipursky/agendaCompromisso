<?php

namespace App\Models;

use CodeIgniter\Model;

class CompromissoModel extends Model
{
    protected $table                = 'compromissos';
    protected $primaryKey           = 'id';
    protected $allowedFields        = [
        'titulo',
        'horario'
    ];
}

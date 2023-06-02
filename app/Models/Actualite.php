<?php

namespace App\Models;

use CodeIgniter\Model;

class Actualite extends Model
{
    protected $table = 'ACTUALITE';
    protected $primaryKey = 'id_actu';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_actu', 'titre', 'message'];
}

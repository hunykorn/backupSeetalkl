<?php

namespace App\Models;

use CodeIgniter\Model;

class Reunion extends Model
{
    protected $table = 'REUNION';
    protected $primaryKey = 'id_reunion';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_reunion', 'nom', 'description', 'password', 'date_reunion'];
}

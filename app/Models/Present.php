<?php

namespace App\Models;

use CodeIgniter\Model;

class Present extends Model
{
    protected $table = 'PRESENT';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_user', 'id_reunion'];
}

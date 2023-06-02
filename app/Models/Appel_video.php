<?php

namespace App\Models;

use CodeIgniter\Model;

class Appel_video extends Model
{
    protected $table = 'APPEL_VIDEO';
    protected $primaryKey = 'id_appel';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_appel', 'date_appel', 'duree'];
}

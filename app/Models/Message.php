<?php

namespace App\Models;

use CodeIgniter\Model;

class Message extends Model
{
    protected $table = 'Message';
    protected $primaryKey = 'id_message';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_message', 'contenu', 'date_message'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Utilisateur extends Model
{
    protected $table = 'UTILISATEUR';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_user', 'pseudo', 'nom', 'prenom', 'password', 'societe', 'bio', 'email', 'telephone', 'img'];
}

<?php

namespace App\Controllers;

use App\Models\Utilisateur;
use mysqli;

class Auth extends BaseController
{


    public function login()
    {
        echo view("/template/header");
        echo view("/login");
        echo view("/template/footer");
    }

    public function postLogin()
    {
        $session = session();
        $login = $this->request->getVar('pseudo');
        $mdp = $this->request->getVar('mdp');
        $bd = new Utilisateur();
        $query = 'select * from UTILISATEUR where (pseudo = :pseudo: or email = :email:) and validation = 1;';
        if (preg_match('^@^', $login)) {
            $result = $bd->query($query, [
                'pseudo' => '',
                'email' => $login,
            ])->getRowArray();
        } else {
            $result = $bd->query($query, [
                'pseudo' => $login,
                'email' => '',
            ])->getRowArray();
        }
        if (!empty($result)) {
            if ($mdp == $result['PASSWORD']) {
                $session->set($result);
                $session->set(['isLoggedIn' => true]);
                $session->set(['name' => 'nicolas']);
                return redirect()->to(base_url('/accueil'));
            }
        } else {
            $session->set(['isLoggedIn' => false]);
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }

    public function inscription()
    {
        $session = session();
        $data['session'] = $session;
        echo view('template/header');
        echo view('inscription', $data);
        echo view('template/footer');
    }

    public function postInscription()
    {
        $pseudo = $this->request->getVar('pseudo');
        $email = $this->request->getVar('email');
        $mdp = $this->request->getVar('mdp');
        $img = $this->request->getFile('img');
        $nom = $this->request->getVar('nom');
        $prenom = $this->request->getVar('prenom');
        $societe = $this->request->getVar('societe');
        $telephone = $this->request->getVar('telephone');
        $bio = $this->request->getVar('bio');
        if($this->request->getVar('grade')){
            $grade = $this->request->getVar('grade');
        }
        $bd = new Utilisateur();
        $pseudo_rec = "'".$pseudo."'";
        $verification = 'select count(pseudo) as cout FROM UTILISATEUR WHERE pseudo = '.$pseudo_rec;
        $rep = $bd->query($verification);
        foreach($rep->getResult('array') as $row){
            if($row["cout"] >= 1){
                setcookie("erreur", 'Pseudo déjà utiliser',time()+1);
                return redirect()->to(base_url('/inscription'));
            }
        }

        $query = 'insert into UTILISATEUR (pseudo, nom, prenom, password, societe, bio, email, telephone, img, grade) values (:pseudo:, :nom:, :prenom:, :password:, :societe:, :bio:, :email:, :telephone:, :img:, :grade:)';
        $bd->query($query, [
            'pseudo' => $pseudo,
            'nom' => $nom,
            'prenom' => $prenom,
            'password' => $mdp,
            'societe' => $societe,
            'bio' => $bio,
            'email' => $email,
            'telephone' => $telephone,
            'img' => $img,
            'grade' => isset($grade) ? $grade : "0",
        ]);
        $name_file = $img->getName();
        $img->move("img/$pseudo");
        return redirect()->to(base_url('/accueil'));
    }

    public function postValidation($id) {
        $db = new Utilisateur();
        $query = 'SELECT * FROM UTILISATEUR WHERE ID_USER = :id:;';
        $user = $db->query($query, ['id' => $id])->getRowArray();
        $status = $user['VALIDATION'];
        $query = 'UPDATE UTILISATEUR SET VALIDATION = :status: WHERE ID_USER = :id:;';
        if($status == 0){
            $db->query($query, [
                'status' => 1,
                'id' => $id,
            ]);
        } else {
            $db->query($query, [
                'status' => 0,
                'id' => $id,
            ]);
        }
        return redirect()->to(base_url('/gestion_utilisateurs'));
    }
}

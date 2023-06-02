<?php

namespace App\Controllers;
use App\Models\Utilisateur;

class Gestion extends BaseController{


    public function gestion_utilisateurs(){
        $db = new Utilisateur();
        $query = 'select * from UTILISATEUR';
        $data['utilisateurs'] = $db->query($query)->getResultArray();

        echo view("/template/header");
        echo view("/gestion_utilisateurs", $data);
        echo view("/template/footer");
    }

    public function postSupprimerUtilisateur(){
        $db = new Utilisateur();
        $query = 'delete from UTILISATEUR where ID_USER = :id:';
        $db->query($query, [
            'id' => $this->request->getVar('id_user'),
        ]);
        return redirect()->to(base_url('gestion_utilisateurs'));
    }

    public function modifier($id){
        $session = session();
        $bd = new Utilisateur();
        $query = 'select * from UTILISATEUR where ID_USER = :id:';
        $result = $bd->query($query, ['id' => $id])->getRowArray();
        $data['user_data'] = $result;
        $data['id'] = $id;
        $data['titre'] = 'modifier ' . $result['PSEUDO'];
        $data['session'] = $session;
        echo view('template/header');
        echo view('inscription', $data);
        echo view('template/footer');
    }

    public function postModifier(){
        $bd = new Utilisateur();
        $postData = $this->request->getPost();
        $query = "update UTILISATEUR set PSEUDO = :pseudo:, NOM = :nom:, PRENOM = :prenom:, PASSWORD = :password:, SOCIETE = :societe:, EMAIL = :email:, TELEPHONE = :telephone:, GRADE = :grade: where ID_USER = :id:";
        $bd->query($query, [
            'pseudo' => $postData['pseudo'],
            'nom' => $postData['nom'],
            'prenom' => $postData['prenom'],
            'password' => $postData['mdp'],
            'societe' => $postData['societe'],
            'email' => $postData['email'],
            'telephone' => $postData['telephone'],
            'grade' => $postData['grade'],
            'id' => $postData['id'],
        ]);
        return redirect()->to(base_url('gestion_utilisateurs'));
    }

    public function modifierSingle($id){
        $session = session();
        $bd = new Utilisateur();
        $query = 'select * from UTILISATEUR where ID_USER = :id:';
        $result = $bd->query($query, ['id' => $id])->getRowArray();
        $data['user_data'] = $result;
        $data['id'] = $id;
        $data['titre'] = 'modifier ' . $result['PSEUDO'];
        $data['session'] = $session;
        $data['single'] = true;
        echo view('template/header');
        echo view('inscription', $data);
        echo view('template/footer');
    }

    public function postModifierSingle(){
        $bd = new Utilisateur();
        $postData = $this->request->getPost();
        var_dump($postData);
        $query = "update UTILISATEUR set PSEUDO = :pseudo:, NOM = :nom:, PRENOM = :prenom:, PASSWORD = :password:, SOCIETE = :societe:, EMAIL = :email:, BIO = :bio:, TELEPHONE = :telephone: where ID_USER = :id:";
        $bd->query($query, [
            'pseudo' => $postData['pseudo'],
            'nom' => $postData['nom'],
            'prenom' => $postData['prenom'],
            'password' => $postData['mdp'],
            'societe' => $postData['societe'],
            'email' => $postData['email'],
            'bio' => $postData['bio'],
            'telephone' => $postData['telephone'],
            'id' => $postData['id'],
        ]);
        return redirect()->to(base_url('/fiche_user'));
    }



}

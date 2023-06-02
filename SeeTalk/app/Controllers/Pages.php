<?php

namespace App\Controllers;

use App\Models\Utilisateur;

class Pages extends BaseController
{
    public function accueil()
    {
        echo view('template/header');
        echo view('accueil');
        echo view('template/footer');
    }




    public function add_contact()
    {
        echo view('template/header');
        echo view('add_contact');
        echo view('template/footer');
    }

    public function creation()
    {
        echo view('template/header');
        echo view('creation');
        echo view('template/footer');
    }

    public function fiche_user()
    {
        $session = session();
        $bd = new Utilisateur();
        $query = 'select * from UTILISATEUR where ID_USER = :id:';
        $result = $bd->query($query, [
            'id' => $session->get('ID_USER'),
        ])->getRowArray();

        $data['user_data'] = $result;
        $data['user_data']['IMG'] = './img/'.$data['user_data']['PSEUDO'].'.png';
        $data['session'] = $session;

        echo view('template/header');
        echo view('fiche_user', $data);
        echo view('template/footer');
    }

    public function mentions_legales()
    {
        echo view('template/header');
        echo view('mentions_legales');
        echo view('template/footer');
    }

    public function contact()
    {
        echo view('template/header');
        echo view('contact');
        echo view('template/footer');
    }

    public function addImage(){
        echo view('template/header');
        echo view('add_profileImg');
        echo view('template/footer');
    }

    public function addImagePost(){
        $bd = new Utilisateur();
        $pseudo = $_POST['name'];
        $img = $this->request->getFile('img');
        $name = $img->getName();

        $querry = "UPDATE UTILISATEUR SET IMG = '$name' WHERE pseudo = '$pseudo'";
        $bd->query($querry);
        $img->move("img",$pseudo.".png");

        $query = "select * from UTILISATEUR where PSEUDO = '$pseudo'";
        $result = $bd->query($query)->getRowArray();
        $data['user_data'] = $result;
        $data['user_data']['IMG'] = './img/'.$name.'.png';
        return redirect()->to(base_url('/fiche_user'));
    }
}

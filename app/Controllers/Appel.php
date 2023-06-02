<?php

namespace App\Controllers;
use App\Models\Reunion;

class Appel extends BaseController{

    public function saisieMdp()
    {
        echo view('template/header');
        echo view('saisieMdp');
        echo view('template/footer');
    }

    public function statutReunion(){
        /*VERIFICATION QUE LE PASS SAISIE CORRESPONDE A UNE REUNION*/
        $db= new Reunion;
        $postData = $this->request->getPost();
        $infoReunion=$db->query('select id_reunion,date_reunion from REUNION where PASSWORD = :pass:', ['password' => $postData['pass']])->getRowArray();
/*      if ($infoReunionID ==  NUll)
        {
            message="La réunion n'existe pas";
            return redirect()->to(base_url('/appel/message'));
        }

        $dateNow=new \DateTime();
        $tempsAvance = new \DateTime();
        $tempsAvance->modify("-15 minutes");

        if ($infoReunionID != NULL and date_reunion>$dateNow-$tempsAvance)
        {
            message="La réunion n'a pas encore commencé";
            return redirect()->to(base_url('/appel/message'));
        }
        if ($infoReunionID != NULL and date_reunion=<$dateNow-$tempsAvance)
        {
            $query = 'select nom from UTILISATEUR where id_user = :id_user ;'
            join chatbox of  $infoReunionID;
            return redirect()->to(base_url('/appel'));
        }*/
    }

}

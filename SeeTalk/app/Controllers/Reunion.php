<?php

namespace App\Controllers;

use App\Models\Utilisateur;
use App\Models\Inclure;
use App\Models\Reunion as Reu;
use App\Models\Present;


class Reunion extends BaseController
{
    public function creer_reunion()
    {
        $db = new Utilisateur();
        $query = "select * from UTILISATEUR where GRADE != 100";
        $result = $db->query($query)->getResultArray();
        $data['utilisateurs'] = $result;
        echo view('template/header');
        echo view('creer_reunion', $data);
        echo view('template/footer');
    }

    public function postCreer_reunion()
    {
        $db = new Utilisateur();
        $postData = $this->request->getPost();
        $query = "insert into REUNION (NOM, DATE_REUNION, PASSWORD, DESCRIPTION) values (:nom:, :date:, :password:, :description:);";
        $db->query($query, [
            'nom' => $postData['group_name'],
            'date' => $postData['group_date'] . " " . $postData['group_time'],
            'password' => $postData['group_password'],
            'description' => $postData['description'],
        ]);
        $members = json_decode($postData['json-members-list'], true);

        $reunion = $db->query('select ID_REUNION from REUNION where NOM = :nom:', ['nom' => $postData['group_name']])->getRowArray();

        $db = new Inclure();
        foreach ($members as $member) {
            $query = "INSERT INTO `INCLURE` (`ID_USER`, `ID_REUNION`) VALUES (:user:, :reunion:)";
            $db->query($query, [
                'user' => $member,
                'reunion' => $reunion,
            ]);
        }
        return redirect()->to(base_url('/accueil'));
    }

    public function mesreunions()
    {
        $session = session();
        $db = new Reu();
        $query = 'SELECT * FROM REUNION
        JOIN INCLURE ON REUNION.ID_REUNION = INCLURE.ID_REUNION
        WHERE INCLURE.ID_USER = :id:';
        $data['reunions'] = $db->query($query, ['id' => $session->get('ID_USER')])->getResultArray();
        $query = 'SELECT * FROM UTILISATEUR
        JOIN INCLURE ON UTILISATEUR.ID_USER = INCLURE.ID_USER
        WHERE INCLURE.ID_REUNION = :id:';

        foreach ($data['reunions'] as $reunion) {
            $data['reunions'][array_search($reunion, $data['reunions'])]['participants'] = $db->query($query, ['id' => $reunion['ID_REUNION']])->getResultArray();
        }

        $query = 'SELECT * FROM PRESENT';
        $result = $db->query($query)->getResultArray();
        $data['present'] = [];
        $data['reunions_present'] = [];
        foreach($result as $row){
            $data['present'][$row['ID_USER']] = [];
            $data['reunions_present'][$row['ID_REUNION']] = [];
        }
        foreach($result as $row){
            array_push($data['present'][$row['ID_USER']], $row['ID_REUNION']);
            array_push($data['reunions_present'][$row['ID_REUNION']], $row['ID_USER']);
        }

        echo view('template/header');
        echo view('mesreunions', $data);
        echo view('template/footer');
    }

    public function postMesreunions()
    {
        $postData = $this->request->getPost();

        $db = new Present();
        $insert = 'INSERT INTO PRESENT (ID_USER, ID_REUNION) VALUES (:id_user:, :id_reunion:)';
        $delete = 'DELETE FROM PRESENT WHERE ID_USER = :id_user: AND ID_REUNION = :id_reunion:';
        $select = 'SELECT * FROM PRESENT WHERE ID_USER = :id_user: AND ID_REUNION = :id_reunion:';
        $result = $db->query($select, [
            'id_user' => $postData['id_user'],
            'id_reunion' => $postData['id_reunion'],
        ]);

        if ($postData['presence'] == 'absent') {
            $db->query($insert, [
                'id_user' => $postData['id_user'],
                'id_reunion' => $postData['id_reunion'],
            ]);
        } else if ($postData['presence'] == 'present') {
            $db->query($delete, [
                'id_user' => $postData['id_user'],
                'id_reunion' => $postData['id_reunion'],
            ]);
        }

        return redirect()->to(base_url('/mesreunions'));
    }

    public function appel()
    {
        echo view('template/header');
        echo view('appel');
        echo view('template/footer');
    }
}

<?php


class UserManager extends Manager
{

    function addMembersdb($values)
    {
        $db = $this->db;
        if (!isset($values['id'])) {
            $query = "INSERT INTO membres( pseudo, pass, email) VALUES( :pseudo, :pass, :email)";
        }
        $req = $db->prepare($query);
        if (isset($values['id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':pseudo', $values['pseudo'], PDO::PARAM_STR);
        $req->bindValue(':pass', $values['pass'], PDO::PARAM_STR);
        $req->bindValue(':email', $values['email'], PDO::PARAM_STR);
        $req->execute();
    }

    function getMembersdb($values)
    {
        // selection d'un membre
        $db =$this->db;

        $query="SELECT id FROM Membres WHERE (pseudo = :pseudo)";

        $req = $db->prepare($query);

        $req->bindValue(':pseudo', $values['pseudo'], PDO::PARAM_STR);

        $req->execute(['pseudo'=>$_POST['pseudo']]);

        $result = $req->fetch();

        return $result;
    }
    /*function getAdmin(){

        $db=$this->db;

        $query="SELECT * FROM Membres WHERE role = admin ";

        $req = $db->prepare($query);
        $req->execute();
        var_dump($req);die;

    }*/


}
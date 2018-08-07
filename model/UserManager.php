<?php


class UserManager extends Manager
{

    function addMembersdb($values)
    {
        $db = $this->db;
        if (!isset($values['id'])) {

            $query = "INSERT INTO membres( pseudo, pass, email, date_inscription) VALUES( :pseudo, :pass, :email, NOW())";
        }
        $req = $db->prepare($query);
        if (isset($values['id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':pseudo', $values['pseudo'], PDO::PARAM_STR);
        $req->bindValue(':pass', $values['pass'], PDO::PARAM_STR);
        $req->bindValue(':email', $values['email'], PDO::PARAM_STR);

        $req->execute();
    }

    function getMembersdb()
    {
        // selection d'un membre
        $db =$this->db;

        $query="SELECT * FROM membres WHERE pseudo = :pseudo  ";

        $req = $db->prepare($query);

        $req->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);

        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);
        {
            $user = new Membres();
            $user->setId($row['id']);
            $user->setRole($row['role']);
            $user->setPseudo($row['pseudo']);
            $user->setPass($row['pass']);
            $user->setEmail($row['email']);
            $user->setDateInscription($row['date_inscription']);

        }

        return $user;

    }



    /*function getAdmin(){

        $db=$this->db;

        $query="SELECT * FROM Membres WHERE role = admin ";

        $req = $db->prepare($query);
        $req->execute();
        var_dump($req);die;

    }*/


}
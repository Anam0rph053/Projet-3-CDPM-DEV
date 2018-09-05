<?php


class UserManager extends Manager
{

    function addMembersdb($user)
    {
        $db = $this->db;

            $query = "INSERT INTO membres( pseudo, pass, email, date_inscription) VALUES( :pseudo, :pass, :email, NOW())";

        $req = $db->prepare($query);

        $req->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $req->bindValue(':pass', $user->getPass(), PDO::PARAM_STR);
        $req->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);

        $req->execute();
    }

    function getMembersdb()
    {
        $db =$this->db;

        $query="SELECT * FROM membres WHERE pseudo = :pseudo ";

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

    function getMemberDb($id){
        $db=$this->db;

        $query = "SELECT * FROM membres WHERE id = :id";

        $req = $db->prepare($query);

        $req->bindValue(':id', $id, PDO::PARAM_INT);

        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        $user = new Membres();
        $user->setId($row['id']);
        $user->setrole($row['role']);
        $user->setPseudo($row['pseudo']);
        $user->setPass($row['pass']);
        $user->setEmail($row['email']);
        $user->setDateInscription($row['date_inscription']);

        return $user;

    }

    function getMemberProfil($pseudo)
    {
        $db=$this->db;

        $query = "SELECT * FROM membres WHERE pseudo = :pseudo";

        $req = $db->prepare($query);

        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        $user = new Membres();
        $user->setId($row['id']);
        $user->setrole($row['role']);
        $user->setPseudo($row['pseudo']);
        $user->setPass($row['pass']);
        $user->setEmail($row['email']);
        $user->setDateInscription($row['date_inscription']);

        return $user;
    }
    function deleteMemberDb()
    {
        $db = $this->db;

        $query = "DELETE FROM membres WHERE id = :id ";

        $req = $db->prepare($query);

        $req->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

        $req->execute();
    }

}
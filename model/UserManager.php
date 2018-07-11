<?php


class UserManager extends Manager
{

    // Insertion
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
            $db =$this->db;
            $query="SELECT * FROM membres WHERE pseudo = :pseudo";
            $req=$db->prepare($query);
            if (isset($values['id'])) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
            $req->bindValue(':pseudo',$values ['pseudo']);
            $req->execute();
            $result = $req->fetch();

            $isPasswordCorrect = password_verify($_POST['pass'], $result['pass']);
            if ($isPasswordCorrect === true) {
                return $result;
            };

        }



    }

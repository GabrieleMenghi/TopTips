<?php

class databaseHelper {
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this-> db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connessione fallita al db");
        }
    }

    public function getPosts($n=-1){
        $query = "SELECT idpost, titolopost, img1, img2, img3, img4, datapost, anteprimapost,
        nome FROM post, utente WHERE utente=idutente ORDER BY datapost DESC";
        if($n>0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n>0){
            $stmt->bind_param("i", $n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getComments(){
        $stmt = $this->db->prepare("SELECT post, utente, datacommento, testo, nome FROM commento, utente
                                    WHERE utente=idutente");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByUserId($id){ //cerco nel db I POST dell'utente in base al suo ID
        $query = "SELECT idpost, titolopost, img1, img2, img3, img4 FROM post WHERE utente=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProfileByUserId($id){ //cerco nel db il PROFILO dell'utente in base al suo ID
        $query = "SELECT idprofilo, username, imgprofilo FROM profilo WHERE utente=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($username, $password){
        $query = "SELECT idutente, username, nome FROM utente WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>
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
        $query = "SELECT idpost, titolopost, immagine1.filename AS file1, immagine2.filename AS file2, immagine3.filename AS file3, immagine4.filename AS file4, datapost, anteprimapost, username,
        immagine1.votes as votes1, immagine2.votes as votes2, immagine3.votes as votes3, immagine4.votes as votes4,
        img1, img2, img3, img4
        FROM post JOIN utente ON post.utente = utente.idutente
        LEFT JOIN immagine AS immagine1 ON post.img1 = immagine1.image_id
        LEFT JOIN immagine AS immagine2 ON post.img2 = immagine2.image_id
        LEFT JOIN immagine AS immagine3 ON post.img3 = immagine3.image_id
        LEFT JOIN immagine AS immagine4 ON post.img4 = immagine4.image_id
        ORDER BY datapost DESC";
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
        $stmt = $this->db->prepare("SELECT post, utente, datacommento, testo, username FROM commento, utente
                                    WHERE utente=idutente");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByUserId($id){
        $query = "SELECT idpost, titolopost, immagine1.filename AS file1, immagine2.filename AS file2, immagine3.filename AS file3, immagine4.filename AS file4
        FROM post
        LEFT JOIN immagine AS immagine1 ON post.img1 = immagine1.image_id
        LEFT JOIN immagine AS immagine2 ON post.img2 = immagine2.image_id
        LEFT JOIN immagine AS immagine3 ON post.img3 = immagine3.image_id
        LEFT JOIN immagine AS immagine4 ON post.img4 = immagine4.image_id 
        WHERE utente=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProfileByUserId($id){
        $query = "SELECT idprofilo, username, imgprofilo FROM profilo WHERE utente=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function incrementVote($image_filename){
        $query = "UPDATE immagine SET votes = votes + 1 WHERE immagine.filename = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $image_filename);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>
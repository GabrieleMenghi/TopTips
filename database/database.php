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
        $query = "SELECT idpost, titolopost, immagine1.filename AS file1, immagine2.filename AS file2, immagine3.filename AS file3, immagine4.filename AS file4, testopost, datapost, username,
        immagine1.votes as votes1, immagine2.votes as votes2, immagine3.votes as votes3, immagine4.votes as votes4,
        img1, img2, img3, img4, imgprofilo, DATEDIFF(CURDATE(), datapost) as datadiff
        FROM post JOIN utente ON post.utente = utente.idutente
        JOIN profilo ON utente.idutente = profilo.utente
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
                                    WHERE utente=idutente
                                    ORDER BY datacommento DESC");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByUserId($id){
        $query = "SELECT idpost, titolopost, immagine1.filename AS file1, immagine2.filename AS file2, immagine3.filename AS file3, immagine4.filename AS file4, immagine1.votes as votes1, immagine2.votes as votes2, immagine3.votes as votes3, immagine4.votes as votes4, immagine1.descrizione as desc1, immagine2.descrizione as desc2, immagine3.descrizione as desc3, immagine4.descrizione as desc4
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

    public function getPostById($id){
        $query = "SELECT * FROM post WHERE idpost=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProfileByUserId($id){
        $query = "SELECT idprofilo, imgprofilo, datipersonali, username FROM profilo, utente WHERE profilo.utente = utente.idutente AND utente=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deletePost($idpost){
        $query = "DELETE FROM post WHERE idpost = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idpost);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }

    public function insertProfile($datipersonali, $imgprofilo, $utente){
        $query = "INSERT INTO profilo(datipersonali, imgprofilo, utente) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssi',$datipersonali, $imgprofilo, $utente);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updateProfile($datipersonali, $imgprofilo, $utente){
        $query = "UPDATE profilo SET datipersonali = ?, imgprofilo = ? WHERE utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssi', $datipersonali, $imgprofilo, $utente);

        return $stmt->execute();
    }

    public function searchUser($keyword){
        $query = "SELECT username, imgprofilo FROM utente, profilo WHERE utente.idutente = profilo.utente AND username LIKE ? ";
        $stmt = $this->db->prepare($query);
        $keyword = $keyword."%";
        $stmt->bind_param('s',$keyword);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function followUser($seguito, $seguitore) {
        $query = "INSERT INTO followers (seguito, seguitore) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $seguito, $seguitore);
        $result = $stmt->execute();

        return $result;
    }
    
    public function unfollowUser($seguito, $seguitore) {
        $query = "DELETE FROM followers WHERE seguito = ? AND seguitore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $seguito, $seguitore);
        $result = $stmt->execute();

        return $result;
    }

    public function isFollowing($seguito, $seguitore) {
        $query = "SELECT * FROM followers WHERE seguito = ? AND seguitore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $seguito, $seguitore);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getNumberOfSeguitiById($idprofilopersonale) {
        $query = "SELECT COUNT(*) as num_seguiti FROM followers WHERE seguitore = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idprofilopersonale);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNumberOfSeguaciById($idprofilopersonale) {
        $query = "SELECT COUNT(*) as num_seguaci FROM followers WHERE seguito = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idprofilopersonale);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getListOfSeguitiById($idprofilopersonale) {
        $query = "SELECT username FROM utente, followers WHERE seguito = idutente AND seguitore = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idprofilopersonale);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getListOfSeguaciById($idprofilopersonale) {
        $query = "SELECT username FROM utente, followers WHERE seguitore = idutente AND seguito = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idprofilopersonale);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getIdByUsername($username){
        $query = "SELECT idutente FROM utente WHERE username = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostsOfUsers($user_id_array){
        $posts_list = array();
        foreach($user_id_array as $user){
            $query = "SELECT idpost, titolopost, immagine1.filename AS file1, immagine2.filename AS file2, immagine3.filename AS file3, immagine4.filename AS file4, testopost, datapost, post.utente as utente, username,
            immagine1.votes as votes1, immagine2.votes as votes2, immagine3.votes as votes3, immagine4.votes as votes4,
            img1, img2, img3, img4, immagine1.descrizione as desc1, immagine2.descrizione as desc2, immagine3.descrizione as desc3, immagine4.descrizione as desc4, imgprofilo,
            DATEDIFF(CURDATE(), datapost) as datadiff
            FROM post JOIN utente ON post.utente = utente.idutente
            JOIN profilo ON utente.idutente = profilo.utente
            LEFT JOIN immagine AS immagine1 ON post.img1 = immagine1.image_id
            LEFT JOIN immagine AS immagine2 ON post.img2 = immagine2.image_id
            LEFT JOIN immagine AS immagine3 ON post.img3 = immagine3.image_id
            LEFT JOIN immagine AS immagine4 ON post.img4 = immagine4.image_id
            WHERE post.utente = ?
            ORDER BY datapost DESC";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i',$user["seguito"]);
            $stmt->execute();
            $result = $stmt->get_result();
            $posts = $result->fetch_all(MYSQLI_ASSOC);
            foreach($posts as $post){
                array_push($posts_list, $post);
            }
        }

        return $posts_list;
    }

    public function getNotificationsById($id){
        $query = "SELECT * FROM notifica WHERE utentenotificato=? ORDER BY datanotifica DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function profileVotesPost($idprofile){
        $query = "SELECT * FROM post_profilo_voti WHERE idprofilo=?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idprofile);

        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFollowedBy($user_id){
        $query = "SELECT DISTINCT seguito FROM followers WHERE seguitore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addComment($post, $author, $text){
        $query = "INSERT INTO commento VALUES (?, ?, NOW(), ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iis',$post, $author, $text);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function insertNotify($testo, $utentenotificante, $utentenotificato){
        $sql = "INSERT INTO notifica (`testo`, `letta`, `utentenotificante`, `utentenotificato`, `datanotifica`)
        VALUES (?, 0, ?, ?, NOW())";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sii', $testo, $utentenotificante, $utentenotificato);
        $stmt->execute();
    }

    public function getUsernameByIdUtente($idutente){
        $query = "SELECT username FROM utente WHERE idutente=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idutente);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTitleByIdPost($idpost){
        $query = "SELECT titolopost FROM post WHERE idpost=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idpost);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>
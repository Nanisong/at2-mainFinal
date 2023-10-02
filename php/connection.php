<?php
 
class connection{
    
    public $connection;
	protected $query;

    public function __construct($dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = 'gallery', $charset = 'utf8'){
        try {
            $this->connection = new PDO(
                "mysql:host=$dbhost; dbname=$dbname",
                $dbuser, $dbpass
            );
             
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);   
        } catch(PDOException $e) {
            echo "Connection failed: "
                . $e->getMessage();
        }
    }

    public function getWholeGallery($tbName = 'paint'){
        $stmt = $this->connection->prepare(
            "SELECT * FROM $tbName ORDER BY name");
        $stmt->execute();
        $g = $stmt->fetchAll(); 
       return $g;
    }

    public function insert($name,$year,$media,$artist_id,$style,$img,$tn){
        $query = "INSERT INTO paint (name,year,media,artist_id,style,img,tn) VALUES(?,?,?,?,?,?,?)";
        $statement = $this->connection->prepare($query);
        $result = $statement->execute(
          array($name,$year,$media,$artist_id,$style,$img,$tn));
          $id = $this->connection->lastInsertId();
        return $id;
    }

    public function del($id,$tbname = 'paint'){
        $query = "DELETE FROM $tbname WHERE id=?";
        $stmt= $this->connection->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
    public function findById($id,$tbname = 'paint'){
        $query = "SELECT * FROM $tbname WHERE id=?";
        $stmt= $this->connection->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row;
    }

    public function findPaintWithArtistById($id,$tbName1 = 'paint',$tbName2='portrait'){
        $stmt = $this->connection->prepare(
            "SELECT id,name,year,media,artist_id,artist,nationality,birth,passing,ptrimg,ptrthn,style,img,tn FROM $tbName1 
            LEFT JOIN $tbName2  ON $tbName1.artist_id = $tbName2.a_id WHERE id = ? ORDER BY $tbName1.name"
        );
       // $stmt= $this->connection->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row;
    }

    public function update($id,$name,$year,$media,$artist_id,$style,$img,$tn,$tbname = 'paint'){
        $sql = "UPDATE $tbname SET name=?, year=?,media=?,artist_id=?,style=?,img=?,tn=? WHERE id=?";
        $stmt= $this->connection->prepare($sql);
        $stmt->execute([$name,$year,$media,$artist_id,$style,$img,$tn,$id]);
        return $stmt;
    }

    public function findByTitle($keyword,$tbName1 = 'paint',$tbName2 = 'portrait'){
        
       // $query = "SELECT * FROM $tbname WHERE name LIKE ?";
       $query = "SELECT id,name,year,media,artist_id,artist,nationality,birth,passing,ptrimg,ptrthn,style,img,tn FROM $tbName1 
       LEFT JOIN $tbName2  ON $tbName1.artist_id = $tbName2.a_id WHERE name LIKE ? ORDER BY $tbName1.name";
        $param = "%$keyword%";
        $stmt= $this->connection->prepare($query);
        $stmt->execute([$param]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function findByArtist($keyword,$tbName1 = 'paint',$tbName2 = 'portrait'){
        
        //$query = "SELECT * FROM $tbname WHERE artist LIKE ?";
        $query = "SELECT id,name,year,media,artist_id,artist,nationality,birth,passing,ptrimg,ptrthn,style,img,tn FROM $tbName1 
        LEFT JOIN $tbName2  ON $tbName1.artist_id = $tbName2.a_id WHERE artist LIKE ? ORDER BY $tbName1.name";
        $param = "%$keyword%";
        $stmt= $this->connection->prepare($query);
        $stmt->execute([$param]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function close() {
        $this->connection = null;
    }

    //the DB Query of artist from here
    public function getAllArtists($tbName = 'portrait'){
        $stmt = $this->connection->prepare(
            "SELECT * FROM $tbName ORDER BY artist");
        $stmt->execute();
        $a = $stmt->fetchAll(); 
       return $a;
    }

    public function getAllArtistNames($tbName = 'portrait'){
        $stmt = $this->connection->prepare(
            "SELECT artist FROM $tbName ORDER BY artist");
        $stmt->execute();
        $a = $stmt->fetchAll(); 
       return $a;
    }

    public function getWholeGalleryWithArtist($tbName1 = 'paint',$tbName2 = 'portrait',){

        $stmt = $this->connection->prepare(
            "SELECT id,name,year,media,artist_id,artist,nationality,birth,passing,ptrimg,ptrthn,style,img,tn FROM $tbName1 
            LEFT JOIN $tbName2  ON $tbName1.artist_id = $tbName2.a_id ORDER BY $tbName1.name"
        );
        $stmt->execute();
        $g = $stmt->fetchAll(); 
       return $g;
    }

    public function insertArtist($name,$nationality,$birth,$passing,$img,$tn){
        $query = "INSERT INTO portrait (artist,nationality,birth,passing,ptrimg,ptrthn) VALUES(?,?,?,?,?,?)";
        $statement = $this->connection->prepare($query);
        $result = $statement->execute(
          array($name,$nationality,$birth,$passing,$img,$tn));
          $id = $this->connection->lastInsertId();
        return $id;
    }

    public function updateArtist($id,$name,$nationality,$birth,$passing,$img,$tn,$tbname = 'portrait'){
        $sql = "UPDATE $tbname SET artist=?, nationality=?,birth=?,passing=?,ptrimg=?,ptrthn=? WHERE a_id=?";
        $stmt= $this->connection->prepare($sql);
        $stmt->execute([$name,$nationality,$birth,$passing,$img,$tn,$id]);
        return $stmt;
    }

    public function findArtistById($id,$tbname = 'portrait'){
        $query = "SELECT * FROM $tbname WHERE a_id=?";
        $stmt= $this->connection->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row;
    }

    public function delArtist($id,$tbname = 'portrait'){
        $query = "DELETE FROM $tbname WHERE a_id=?";
        $stmt= $this->connection->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
    
}
?>
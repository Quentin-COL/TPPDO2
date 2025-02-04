<?php
class Continent{
    private $num;
    private $libelle;

    /**
     * Get the value of num
     */ 
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle() : string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle(string $libelle) : self
    {
        $this->libelle = $libelle;

        return $this;
    }
    /**
     * Retourne les continents
     *
     * @return Continent[] tableau de continent 
     */
    public static function findAll():array
    {
        $req=MonPdo::getInstance()->prepare("select * from continent");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->execute();
        $lesResultats=$req->fetchAll();
        return $lesResultats;
    }
    /**
     * trouve un continent par son id
     *
     * @param integer $id
     * @return Continent
     */
    public static function findById(int $id) :Continent{
        $req=MonPdo::getInstance()->prepare("select * from continent where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->bindParam(':id',$id);
        $req->execute();
        $leResultat=$req->fetch();
        return $leResultat;
    }
    /**
     * Ajoute un continent
     *
     * @param Continent $contient
     * @return integer
     */
    public static function add(Continent $continent) :int{ 
        $req=MonPdo::getInstance()->prepare("insert into continent(libelle) values(:libelle)");
        $libelle=$continent->getLibelle();
        $req->bindParam(':libelle', $continent->getLibelle());
        $nb=$req->execute();
        return $nb;
    }
    /**
     * modif un continent
     *
     * @param Continent $continent
     * @return integer
     */
    public static function update(Continent $continent) :int{
        $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
        $num=$continent->getNum();
        $libelle=$continent->getLibelle();
        $req->bindParam(':id',$num);
        $req->bindParam(':libelle',$libelle);
        $nb=$req->execute();
        return $nb;
    }
    /**
     * supprime un continent
     *
     * @param Continent $continent
     * @return integer
     */
    public static function delete(Continent $continent) :int{
        $req=MonPdo::getInstance()->prepare("delete from continent where num= :id");
        $num=$continent->getNum();
        $req->bindParam(':id',$num);  
        $nb=$req->execute();
        return $nb;
    }


    /**
     * Set the value of num
     *
     * @return  self
     */ 
    public function setNum($num) :self
    {
        $this->num = $num;

        return $this;
    }
}

?>
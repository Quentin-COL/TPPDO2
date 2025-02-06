<?php
class Nationalite{
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
    public function setNum(int $num) : self
    {
        $this->num = $num;

        return $this;
    }

    private $numContinent;

    /**
     * revoi le continent
     *
     * @return Continent
     */
    public function getContinent() :  Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * ecrit le num d'un continent
     *
     * @param Continent $continent
     * @return self
     */
    public function setContinent(Continent $continent) : self
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }

    /**
     * Retourne les nationalites
     *
     * @return Nationalite[] tableau de nationalite 
     */
    public static function findAll(?string $libelle="",?string $continent="Tous"):array
    {
        $texteReq = "select n.num as numero, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent = c.num";
        if ($libelle != "") {
            $texteReq .= " and n.libelle Like :libelle";
        }
        if ($continent != "Tous") {
            $texteReq .= " and c.num = :continent";
        }
        $texteReq .= " order by n.libelle";
        $req = MonPdo::getInstance()->prepare($texteReq);
        if ($libelle != "") {
            $libelle = "%$libelle%";
            $req->bindParam(':libelle', $libelle);
        }
        if ($continent != "Tous") {
            $req->bindParam(':continent', $continent);
        }
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;
    }
    /**
     * trouve une nationalite par son id
     *
     * @param integer $id
     * @return Nationalite
     */
    public static function findById(int $id) :Nationalite{
        $req=MonPdo::getInstance()->prepare("select * from nationalite where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        $req->bindParam(':id',$id);
        $req->execute();
        $leResultat=$req->fetch();
        return $leResultat;
    }
    /**
     * Ajoute une nationalite
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function add(Nationalite $nationalite) :int{ 
        $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle,numContinent) values(:libelle, :numContinent)");
        $libelle = $nationalite->getLibelle();
        $numContinent = $nationalite->numContinent;
        $req->bindParam(':libelle', $libelle);
        $req->bindParam(':numContinent', $numContinent);
        $nb = $req->execute();
        return $nb;
    }
    /**
     * modif une nationalite
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function update(Nationalite $nationalite) :int{
        $req=MonPdo::getInstance()->preapare("update nationalite set libelle= :libelle , numContinent= :numContinent where num= :id");
        $req->bindParam(':id',$nationalite->getNum());
        $req->bindParam(':libelle',$nationalite->getLibelle());
        $req->bindParam(':numContinent',$nationalite->numContinent);
        $nb = $req->execute();
        return $nb;
    }
    /**
     * supprime une nationalite
     *
     * @param Nationalite $nationalite
     * @return integer
     */
    public static function delete(Nationalite $nationalite) :int{
        $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
        $num= $nationalite->getNum();
        $req->bindParam(':id',$num);  
        $nb=$req->execute();
        return $nb;
    }


    
}

?>
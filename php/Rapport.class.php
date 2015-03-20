<?php

class Rapport {
    //id ofd the report
    const ID = 'id';
    //date of creation of the report
    const DATE_CREATION = 'date_creation';
    //date of update of the report
    const DATE_MODIFICATION = 'date_modification';
    //key words of the report
    const MOTS_CLES = 'mots_clefs';
    //name on the server of the report
    const NOM_SERV = 'nom_server';
    //origin name of the report
    const NOM_ORIG = 'nom_origin';
    //author of the report
    const AUTEUR = 'auteur';
    //description of the report
    const DESCRIPTION = 'description';
    //subject of the report
    const SUJET = 'sujet';
    //title of the report
    const TITRE = 'titre';
    //the personn who add the report
    const AJOUTEUR = 'ajouteur';
    //the text of the report
    const TEXTE = 'texte';

    
    //list of all the attributs
    protected $attributs = array();

    
    /**
     * getter texte
     * @return texte
     */
    public function getTexte() {
        return $this->attributs[self::TEXTE];
    }

    
    /**
     * getter NomOrigin
     * @return NomOrigin
     */
    public function getNomOrigin() {
        return $this->attributs[self::NOM_ORIG];
    }
    
    
    /**
     * To know if the information of the report are complete
     * @return type
     */
    public function isValide() {
        return $this->getAnnee()&& $this->getAuteur() && $this->getTitre();
    }

    
    /**
     * getter ajouteur
     * @return ajouteur
     */
    public function getAjouteur() {
        return $this->attributs[self::AJOUTEUR];
    }

    /**
     * getter NomServ
     * @return NomServer
     */
    public function getNomServer() {
        return $this->attributs[self::NOM_SERV];
    }

    
    /**
     * getter titre
     * @return titre
     */
    public function getTitre() {
        return $this->attributs[self::TITRE];
    }

    
     /**
     * getter NomServ
     * @return NomServer
     */
    public function getNomServ() {
        return $this->attributs[self::NOM_SERV];
    }

    /**
     * getter auteur
     * @return auteur
     */
    public function getAuteur() {
        return $this->attributs[self::AUTEUR];
    }

    
    
    /**
     * get year
     * @return year
     */
    public function getAnnee() {
        if ($this->attributs[self::DATE_CREATION]) {
            return substr($this->attributs[self::DATE_CREATION], 0, 4);
        } else if ($this->attributs[self::DATE_MODIFICATION]) {
            return substr($this->attributs[self::DATE_MODIFICATION], 0, 4);
        } else {
            return null;
        }
    }

    /**
     * getter list attrivuts
     * @return all attributs in a tab
     */
    public function getAttributes() {
        return $this->attributs;
    }

    
    /**
     * getter date creation
     * @return type
     */
    public function getDateCreation() {
        return $this->attributs[self::DATE_CREATION];
    }

    
    /**
     * getter date update
     * @return date modification
     */
    public function getDateModification() {
        return $this->attributs[self::DATE_MODIFICATION];
    }

    /**
     * getter subject
     * @return subject
     */
    public function getSujet() {
        return $this->attributs[self::SUJET];
    }

    
    /**
     * getter description
     * @return description
     */
    public function getDescription() {
        return $this->attributs[self::DESCRIPTION];
    }

    /**
     * get Key Words
     * @return mots clefs
     */
    public function getMotsClefs() {
        return $this->attributs[self::MOTS_CLES];
    }

    /**
     * getter Id
     * @return Id
     */
    public function getID() {
        return $this->attributs[self::ID];
    }

    /**
     * Constructor
     * @param type $description
     * @param type $titre
     * @param type $sujet
     * @param type $date_creation
     * @param type $date_modification
     * @param type $nom_origin
     * @param type $mots_clefs
     * @param type $nom_server
     * @param type $auteur
     * @param type $ajouteur
     * @param type $texte
     * @param type $id
     */
    public function __construct($description = NULL, $titre = NULL, $sujet = NULL, $date_creation = NULL, $date_modification = NULL, $nom_origin = NULL, $mots_clefs = NULL, $nom_server = NULL, $auteur = NULL, $ajouteur = NULL, $texte = NULL, $id = NULL) {

        $this->attributs[self::ID] = $id;
        $this->attributs[self::DATE_CREATION] = $date_creation;
        $this->attributs[self::DATE_MODIFICATION] = $date_modification;
        $this->attributs[self::NOM_ORIG] = $nom_origin;
        $this->attributs[self::NOM_SERV] = $nom_server;
        $this->attributs[self::AUTEUR] = $auteur;
        $this->attributs[self::TITRE] = $titre;
        $this->attributs[self::SUJET] = $sujet;
        $this->attributs[self::MOTS_CLES] = $mots_clefs;
        $this->attributs[self::DESCRIPTION] = $description;
        $this->attributs[self::AJOUTEUR] = $ajouteur;
        $this->attributs[self::TEXTE] = $texte;
    }

//    public static function delete(int $id) {
//        
//    }
}

<?php

namespace SOGEDEP\Domain;

class Client
 {
  /**
   * Client id.
   *
   * @var integer
   */
  private $_id;

  /**
   * Client comptesogedis.
   *
   * @var string
   */
  private $_comptesogedis;

  /**
   * Client comptesogedep.
   *
   * @var string
   */
  private $_comptesogedep;  

  /**
   * Client comptecompta.
   *
   * @var string
   */
  private $_comptecompta;

  /**
   * Client nom.
   *
   * @var string
   */
  private $_nom;

  /**
   * Client prenom.
   *
   * @var string
   */
  private $_prenom;

  /**
   * Client adresse1.
   *
   * @var string
   */
  private $_adresse1;

  /**
   * Client adresse2.
   *
   * @var string
   */
  private $_adresse2;

  /**
   * Client adresse3.
   *
   * @var string
   */
  private $_adresse3;     

  /**
   * Client codepostal.
   *
   * @var string
   */
  private $_codepostal;

  /**
   * Client ville.
   *
   * @var string
   */
  private $_ville;  

  /**
   * Client email.
   *
   * @var string
   */
  private $_email;

  /**
   * Client initiales.
   *
   * @var string
   */
  private $_initiales;

  /**
   * Client pseudo.
   *
   * @var string
   */
  private $_pseudo; 

  /**
   * Client password.
   *
   * @var string
   */
  private $_password;

  /**
   * Client telephone.
   *
   * @var string
   */
  private $_telephone;  

  /**
   * Client salt.
   *
   * @var string
   */
  private $_salt;

  /**
   * Client role.
   *
   * @var string
   */
  private $_role;     

  public function getId()
   {
    return $this->_id;
   }

  public function setId($id)
   {
    $this->_id = (int) trim($id);
    return $this;
   }

  public function getComptesogedis()
   {
    return $this->_comptesogedis;
   }

  public function setComptesogedis($comptesogedis)
   {
    $this->_comptesogedis = strtoupper(trim($comptesogedis));
    return $this;
   }

  public function getComptesogedep()
   {
    return $this->_comptesogedep;
   }

  public function setComptesogedep($comptesogedep)
   {
    $this->_comptesogedep = strtoupper(trim($comptesogedep));
    return $this;
   }

  public function getComptecompta()
   {
    return $this->_comptecompta;
   }

  public function setComptecompta($comptecompta)
   {
    $this->_comptecompta = strtoupper(trim($comptecompta));
    return $this;
   }     

  public function getNom()
   {
    return $this->_nom;
   }

  public function setNom($nom)
   {
    $this->_nom = strtoupper(trim($nom));
    return $this;
   }

  public function getPrenom()
   {
    return $this->_prenom;
   }

  public function setPrenom($prenom)
   {
    $this->_prenom = ucfirst(trim($prenom));
    return $this;
   }

  public function getAdresse1()
   {
    return $this->_adresse1;
   }

  public function setAdresse1($adresse1)
   {
    $this->_adresse1 = trim($adresse1);
    return $this;
   }

  public function getAdresse2()
   {
    return $this->_adresse2;
   }

  public function setAdresse2($adresse2)
   {
    $this->_adresse2 = trim($adresse2);
    return $this;
   }

  public function getAdresse3()
   {
    return $this->_adresse3;
   }

  public function setAdresse3($adresse3)
   {
    $this->_adresse3 = trim($adresse3);
    return $this;
   }         

  public function getCodepostal()
   {
    return $this->_codepostal;
   }

  public function setCodepostal($codepostal)
   {
    $this->_codepostal = trim($codepostal);
    return $this;
   }

  public function getVille()
   {
    return $this->_ville;
   }

  public function setVille($ville)
   {
    $this->_ville = strtoupper(trim($ville));
    return $this;
   }   

  public function getEmail()
   {
    return $this->_email;
   }

  public function setEmail($email)
   {
    $this->_email = strtolower(trim($email));
    return $this;
   }

  public function getInitiales()
   {
    return $this->_initiales;
   }

  public function setInitiales($initiales)
   {
    $this->_initiales = strtoupper(trim($initiales));
    return $this;
   }

  public function getPseudo()
   {
    return $this->_pseudo;
   }

  public function setPseudo($pseudo)
   {
    $this->_pseudo = trim($pseudo);
    return $this;
   }

  public function getPassword()
   {
    return $this->_password;
   }

  public function setPassword($password)
   {
    $this->_password = trim($password);
    return $this;
   }

  public function getTelephone()
   {
    return $this->_telephone;
   }

  public function setTelephone($telephone)
   {
    $this->_telephone = trim($telephone);
    return $this;
   }

  public function getSalt()
   {
    return $this->_salt;
   }

  public function setSalt($salt)
   {
    $this->_salt = trim($salt);
    return $this;
   }

  public function getRole()
   {
    return $this->_role;
   }

  public function setRole($role)
   {
    $this->_role = trim($role);
    return $this;
   }

 }
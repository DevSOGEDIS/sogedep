<?php

namespace SOGEDEP\Domain;

class Prestataire
 {
  /**
   * Prestataire id.
   *
   * @var integer
   */
  private $id;

  /**
   * Prestataire comptesogedis.
   *
   * @var string
   */
  private $comptesogedis;

  /**
   * Prestataire comptesogedep.
   *
   * @var string
   */
  private $comptesogedep;  

  /**
   * Prestataire comptecompta.
   *
   * @var string
   */
  private $comptecompta;

  /**
   * Prestataire nom.
   *
   * @var string
   */
  private $nom;

  /**
   * Prestataire prenom.
   *
   * @var string
   */
  private $prenom;

  /**
   * Prestataire adresse1.
   *
   * @var string
   */
  private $adresse1;

  /**
   * Prestataire adresse2.
   *
   * @var string
   */
  private $adresse2;

  /**
   * Prestataire adresse3.
   *
   * @var string
   */
  private $adresse3;     

  /**
   * Prestataire codepostal.
   *
   * @var string
   */
  private $codepostal;

  /**
   * Prestataire ville.
   *
   * @var string
   */
  private $ville;  

  /**
   * Prestataire email.
   *
   * @var string
   */
  private $email;

  /**
   * Prestataire initiales.
   *
   * @var string
   */
  private $initiales;

  /**
   * Prestataire pseudo.
   *
   * @var string
   */
  private $pseudo; 

  /**
   * Prestataire password.
   *
   * @var string
   */
  private $password;

  /**
   * Prestataire telephone.
   *
   * @var string
   */
  private $telephone;  

  /**
   * Prestataire salt.
   *
   * @var string
   */
  private $salt;

  /**
   * Prestataire role.
   *
   * @var string
   */
  private $role;     

  public function getId()
   {
    return $this->id;
   }

  public function setId($id)
   {
    $this->id = $id;
    return $this;
   }

  public function getComptesogedis()
   {
    return $this->comptesogedis;
   }

  public function setComptesogedis($comptesogedis)
   {
    $this->comptesogedis = $comptesogedis;
    return $this;
   }

  public function getComptesogedep()
   {
    return $this->comptesogedep;
   }

  public function setComptesogedep($comptesogedep)
   {
    $this->comptesogedep = $comptesogedep;
    return $this;
   }

  public function getComptecompta()
   {
    return $this->comptecompta;
   }

  public function setComptecompta($comptecompta)
   {
    $this->comptecompta = $comptecompta;
    return $this;
   }     

  public function getNom()
   {
    return $this->nom;
   }

  public function setNom($nom)
   {
    $this->nom = $nom;
    return $this;
   }

  public function getPrenom()
   {
    return $this->prenom;
   }

  public function setPrenom($prenom)
   {
    $this->prenom = $prenom;
    return $this;
   }

  public function getAdresse1()
   {
    return $this->adresse1;
   }

  public function setAdresse1($adresse1)
   {
    $this->adresse1 = trim($adresse1);
    return $this;
   }

  public function getAdresse2()
   {
    return $this->adresse2;
   }

  public function setAdresse2($adresse2)
   {
    $this->adresse2 = trim($adresse2);
    return $this;
   }

  public function getAdresse3()
   {
    return $this->adresse3;
   }

  public function setAdresse3($adresse3)
   {
    $this->adresse3 = trim($adresse3);
    return $this;
   }         

  public function getCodepostal()
   {
    return $this->codepostal;
   }

  public function setCodepostal($codepostal)
   {
    $this->codepostal = trim($codepostal);
    return $this;
   }

  public function getVille()
   {
    return $this->ville;
   }

  public function setVille($ville)
   {
    $this->ville = strtoupper(trim($ville));
    return $this;
   }   

  public function getEmail()
   {
    return $this->email;
   }

  public function setEmail($email)
   {
    $this->email = strtolower(trim($email));
    return $this;
   }

  public function getInitiales()
   {
    return $this->initiales;
   }

  public function setInitiales($initiales)
   {
    $this->initiales = strtoupper(trim($initiales));
    return $this;
   }

  public function getPseudo()
   {
    return $this->pseudo;
   }

  public function setPseudo($pseudo)
   {
    $this->pseudo = trim($pseudo);
    return $this;
   }

  public function getPassword()
   {
    return $this->password;
   }

  public function setPassword($password)
   {
    $this->password = trim($password);
    return $this;
   }

  public function getTelephone()
   {
    return $this->telephone;
   }

  public function setTelephone($telephone)
   {
    $this->telephone = trim($telephone);
    return $this;
   }

  public function getSalt()
   {
    return $this->salt;
   }

  public function setSalt($salt)
   {
    $this->salt = trim($salt);
    return $this;
   }

  public function getRole()
   {
    return $this->role;
   }

  public function setRole($role)
   {
    $this->role = trim($role);
    return $this;
   }

 }
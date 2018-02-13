<?php

namespace SOGEDEP\Domain;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
 {
  /**
   * User id.
   *
   * @var integer
   */
  private $id;

  /**
   * User email.
   *
   * @var string
   */
  private $username;

  /**
   * User comptesogedis.
   *
   * @var string
   */
  private $comptesogedis;

  /**
   * User comptesogedep.
   *
   * @var string
   */
  private $comptesogedep;  

  /**
   * User comptecompta.
   *
   * @var string
   */
  private $comptecompta;

  /**
   * User nom.
   *
   * @var string
   */
  private $nom;

  /**
   * User prenom.
   *
   * @var string
   */
  private $prenom;

  /**
   * User adresse1.
   *
   * @var string
   */
  private $adresse1;

  /**
   * User adresse2.
   *
   * @var string
   */
  private $adresse2;

  /**
   * User adresse3.
   *
   * @var string
   */
  private $adresse3;     

  /**
   * User codepostal.
   *
   * @var string
   */
  private $codepostal;

  /**
   * User ville.
   *
   * @var string
   */
  private $ville;  

  /**
   * User email.
   *
   * @var string
   */
  private $email; 

  /**
   * User password.
   *
   * @var string
   */
  private $password;

  /**
   * User telephone.
   *
   * @var string
   */
  private $telephone;  

  /**
   * User salt.
   *
   * @var string
   */
  private $salt;

  /**
   * User role.
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
    $this->id = (int) trim($id);
    return $this;
   }

  /**
   * @inheritDoc
   */
  public function getUsername()
   {
    return $this->username;
   }

  public function setUsername($email)
   {
    $this->username = trim($email);
    return $this;
   }  

  public function getComptesogedis()
   {
    return $this->comptesogedis;
   }

  public function setComptesogedis($comptesogedis)
   {
    $this->comptesogedis = strtoupper(trim($comptesogedis));
    return $this;
   }

  public function getComptesogedep()
   {
    return $this->comptesogedep;
   }

  public function setComptesogedep($comptesogedep)
   {
    $this->comptesogedep = strtoupper(trim($comptesogedep));
    return $this;
   }

  public function getComptecompta()
   {
    return $this->comptecompta;
   }

  public function setComptecompta($comptecompta)
   {
    $this->comptecompta = strtoupper(trim($comptecompta));
    return $this;
   }     

  public function getNom()
   {
    return $this->nom;
   }

  public function setNom($nom)
   {
    $this->nom = strtoupper(trim($nom));
    return $this;
   }

  public function getPrenom()
   {
    return $this->prenom;
   }

  public function setPrenom($prenom)
   {
    $this->prenom = ucfirst(trim($prenom));
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

  /**
   * @inheritDoc
   */
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

  /**
   * @inheritDoc
   */
  public function getRoles()
   {
    return array($this->getRole());
   }

  /**
   * @inheritDoc
   */
  public function eraseCredentials() { }

 }
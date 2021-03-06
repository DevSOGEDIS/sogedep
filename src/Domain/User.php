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
   * User username.
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
   * Salt that was originally used to encode the password.
   *
   * @var string
   */
  private $salt;

  /**
   * Role.
   * Values : ROLE_USER or ROLE_ADMIN.
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

  /**
   * @inheritDoc
   */

  public function getUsername()
   {
    return $this->username;
   }

  public function setUsername($username)
   {
    $this->username = $username;
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
    $this->adresse1 = $adresse1;
    return $this;
   }

  public function getAdresse2()
   {
    return $this->adresse2;
   }

  public function setAdresse2($adresse2)
   {
    $this->adresse2 = $adresse2;
    return $this;
   }

  public function getAdresse3()
   {
    return $this->adresse3;
   }

  public function setAdresse3($adresse3)
   {
    $this->adresse3 = $adresse3;
    return $this;
   }         

  public function getCodepostal()
   {
    return $this->codepostal;
   }

  public function setCodepostal($codepostal)
   {
    $this->codepostal = $codepostal;
    return $this;
   }

  public function getVille()
   {
    return $this->ville;
   }

  public function setVille($ville)
   {
    $this->ville = $ville;
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
    $this->password = $password;
    return $this;
   }

  public function getTelephone()
   {
    return $this->telephone;
   }

  public function setTelephone($telephone)
   {
    $this->telephone = $telephone;
    return $this;
   }

  /**
   * @inheritDoc
   */

  public function getSalt()
   {
    return $this->salt;
   }

  public function setSalt($salt)
   {
    $this->salt = $salt;
    return $this;
   }

  public function getRole()
   {
    return $this->role;
   }

  public function setRole($role)
   {
    $this->role = $role;
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

  public function eraseCredentials() {}

}
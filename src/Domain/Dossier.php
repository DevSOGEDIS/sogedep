<?php

namespace SOGEDEP\Domain;

class Dossier
 {
  /**
   * Dossier id.
   *
   * @var integer
   */
  private $id;

  /**
   * Dossier iduser.
   *
   * @var integer
   */
  private $iduser;

  /**
   * Dossier idmarque.
   *
   * @var integer
   */
  private $idmarque;

  /**
   * Dossier idprestataire.
   *
   * @var integer
   */
  private $idprestataire; 


  public function getId()
   {
    return $this->id;
   }

  public function setId($id)
   {
    $this->id = $id;
    return $this;
   }

  public function getIduser()
   {
    return $this->iduser;
   }

  public function setIduser($iduser)
   {
    $this->iduser = $iduser;
    return $this;
   }

  public function getIdmarque()
   {
    return $this->idmarque;
   }

  public function setIdmarque($idmarque)
   {
    $this->idmarque = $idmarque;
    return $this;
   }

  public function getIdprestataire()
   {
    return $this->idprestataire;
   }

  public function setIdprestataire($idprestataire)
   {
    $this->idprestataire = $idprestataire;
    return $this;
   }  

 }
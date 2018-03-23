<?php

namespace SOGEDEP\Domain;

class Historique
 {
  /**
   * Historique id.
   *
   * @var integer
   */
  private $id;

  /**
   * Historique iddossier.
   *
   * @var integer
   */
  private $iddossier;

  /**
   * Historique iduser.
   *
   * @var integer
   */
  private $iduser;

  /**
   * Historique commentaire.
   *
   * @var string
   */
  private $commentaire;

  /**
   * Associated dossier.
   *
   * @var \SOGEDEP\Domain\Dossier
   */
  private $dossier;

  public function getId()
   {
    return $this->id;
   }

  public function setId($id)
   {
    $this->id = $id;
    return $this;
   }

  public function getIddossier()
   {
    return $this->iddossier;
   }

  public function setIddossier($iddossier)
   {
    $this->iddossier = $iddossier;
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

  public function getCommentaire()
   {
    return $this->commentaire;
   }

  public function setCommentaire($commentaire)
   {
    $this->commentaire = $commentaire;
    return $this;
   }

  public function getDossier()
   {
    return $this->dossier;
   }

  public function setDossier(Dossier $dossier)
   {
    $this->dossier = $dossier;
    return $this;
   }

  public function getUser()
   {
    return $this->user;
   }   

  public function setUser(User $user)
   {
    $this->iduser = $iduser;
    return $this;
   } 

 }
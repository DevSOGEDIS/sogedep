<?php

namespace SOGEDEP\DAO;
use SOGEDEP\Domain\Historique;

class HistoriqueDAO extends DAO 
 {
  /**
   * @var \SOGEDEP\DAO\DossierDAO
   */
  private $dossierDAO;

  /**
   * @var \SOGEDEP\DAO\UserDAO
   */
  private $userDAO;

  public function setDossierDAO(DossierDAO $dossierDAO)
   {
    $this->dossierDAO = $dossierDAO;
   }

  public function setUserDAO(UserDAO $userDAO)
   {
    $this->userDAO = $userDAO;
   }

  /**
   * Return a list of all historiques for an dossier.
   *
   * @param integer $dossierId. dossiers.id DESC.
   * @return array. A list of all historiques for a dossier.
   */

  public function findAllByDossier($dossierId)
   {
    $dossier = $this->dossierDAO->find($dossierId);

    $sql = "SELECT * FROM historiques WHERE iddossier = ? ORDER BY id";
    $result = $this->getDb()->fetchAll($sql, array($dossierId));

    $historiques = array();
    foreach($result as $row)
     {
      $historiqueId = $row['id'];
      $historique = $this->buildDomainObject($row);
      $historique->setDossier($dossier);
      $historiques[$historiqueId] = $historique;
     }
    return $historiques;
   }

  /**
   * Saves a historique into the database.
   *
   * @param \SOGEDEP\Domain\Historique $historique The historique to save
   */

  public function save(Historique $historique)
   {
    $historiqueData = array('iddossier' => $historique->getDossier()->getId(),
                            'iduser' => $historique->getUser()->getId(),
                            'commentaire' => $historique->getCommentaire()
                           );
    if($historique->getId())
     {
      // The historique has already been saved : update it
      $this->getDb()->update('historiques', $historiqueData, array('commentaire' => $historique->getId()));
     }
    else
     {
      // The historique has never been saved : insert it
      $this->getDb()->insert('historiques', $historiqueData);
      // Get the id of the newly created historique and set it on the entity.
      $id = $this->getDb()->lastInsertId();
      $historique->setId($id);
     }
   }   

  /**
   * Creates an Historique object based on a DB row.
   *
   * @param array $row The DB row containing Comment data.
   * @return \SOGEDEP\Domain\Historique
   */

  protected function buildDomainObject(array $row)
   {
    $historique = new Historique();
    $historique->setId($row['id']);
    $historique->setCommentaire($row['commentaire']);
    if(array_key_exists('iddossier', $row))
     {
      // Find and set the associated dossier
      $dossierId = $row['iddossier'];
      $dossier = $this->dossierDAO->find($dossierId);
      $historique->setDossier($dossier);
     }
    if(array_key_exists('iduser', $row))
     {
      // Find and set the associated user
      $userId = $row['iduser'];
      $user = $this->userDAO->find($userId);
      $historique->setIduser($user);
     } 
    return $historique;
   }
 }
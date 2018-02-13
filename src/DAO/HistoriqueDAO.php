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
   * Return a list of all comments for an dossier.
   *
   * @param integer $dossierId. dossiers.id DESC.
   * @return array. A list of all comments for a dossier.
   */

  public function findAllByDossier($dossierId)
   {
    $dossier = $this->dossierDAO->find($dossierId);

    $sql = "SELECT * FROM historiques WHERE iddossier = ? ORDER BY id DESC";
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
        // Find and set the associated article
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
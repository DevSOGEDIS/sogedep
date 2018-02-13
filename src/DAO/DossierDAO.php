<?php

namespace SOGEDEP\DAO;
use SOGEDEP\Domain\Dossier;

class DossierDAO extends DAO
 {
  public function findAll()
   {
    $sql = "SELECT * FROM dossiers";
    $result = $this->getDb()->fetchAll($sql);

    // Convert query result to an array of domain objects
    $dossiers = array();
    foreach ($result as $row)
     {
      $dossierId = $row['id'];
      $dossiers[$dossierId] = $this->buildDomainObject($row);
     }
    return $dossiers;
   }
 
  public function find($id)
   {
    $sql = "SELECT * FROM dossiers WHERE id = ?";
    $row = $this->getDb()->fetchAssoc($sql, array($id));
    if($row)
     {
      return $this->buildDomainObject($row);
     }
    else
     {
      throw new \Exception("Aucun dossier ne correspond à cette demande");
     }
   }   

  protected function buildDomainObject(array $row)
   {
    $dossier = new Dossier();
    $dossier->setId($row['id']);
    $dossier->setIduser($row['iduser']);
    $dossier->setIdmarque($row['idmarque']);
    $dossier->setIdprestataire($row['idprestataire']);
    return $dossier;
   }

 }
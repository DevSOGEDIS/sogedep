<?php

namespace SOGEDEP\DAO;
use SOGEDEP\Domain\Marque;

class MarqueDAO extends DAO
 {
  public function findAll()
   {
    $sql = "SELECT * FROM marques";
    $result = $this->getDb()->fetchAll($sql);

    // Convert query result to an array of domain objects
    $marques = array();
    foreach ($result as $row)
     {
      $marqueId = $row['id'];
      $marques[$marqueId] = $this->buildDomainObject($row);
     }
    return $marques;
   }

  public function find($id)
   {
    $sql = "SELECT * FROM marques WHERE id = ?";
    $row = $this->getDb()->fetchAssoc($sql, array($id));
    if($row)
     {
      return $this->buildDomainObject($row);
     }
    else
     {
      throw new \Exception("Aucune marque ne correspond à cette demande");
     }
   }

  protected function buildDomainObject(array $row)
   {
    $marque = new Marque();
    $marque->setId($row['id']);
    $marque->setMarque($row['marque']);
    return $marque;
   }
 }
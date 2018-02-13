<?php

namespace SOGEDEP\DAO;
use SOGEDEP\Domain\Prestataire;

class PrestataireDAO extends DAO
 {
  public function findAll()
   {
    $sql = "SELECT * FROM utilisateurs WHERE role = 'PRESTATAIRE'";
    $result = $this->getDb()->fetchAll($sql);

    $prestataires = array();
    foreach ($result as $row)
     {
      $prestataireId = $row['id'];
      $prestataires[$prestataireId] = $this->buildDomainObject($row);
     }
    return $prestataires;
   }

  public function find($id)
   {
    $sql = "SELECT * FROM utilisateurs WHERE role = 'PRESTATAIRE' AND id = ?";
    $row = $this->getDb()->fetchAssoc($sql, array($id));
    if($row)
     {
      return $this->buildDomainObject($row);
     }
    else
     {
      throw new \Exception("Aucun prestataire ne correspond à cette demande");
     }
   } 

  protected function buildDomainObject(array $row)
   {
    $prestataire = new Prestataire();
    $prestataire->setId($row['id']);
    $prestataire->setComptesogedis($row['comptesogedis']);
    $prestataire->setComptesogedep($row['comptesogedep']);
    $prestataire->setComptecompta($row['comptecompta']);
    $prestataire->setNom($row['nom']);
    $prestataire->setPrenom($row['prenom']);
    $prestataire->setAdresse1($row['adresse1']);
    $prestataire->setAdresse2($row['adresse2']);
    $prestataire->setAdresse3($row['adresse3']);
    $prestataire->setCodepostal($row['codepostal']);
    $prestataire->setVille($row['ville']);
    $prestataire->setEmail($row['email']);
    $prestataire->setInitiales($row['initiales']);
    $prestataire->setPseudo($row['pseudo']);
    $prestataire->setPassword($row['password']);
    $prestataire->setTelephone($row['telephone']);
    $prestataire->setSalt($row['salt']);
    $prestataire->setRole($row['role']);
    return $prestataire;
   }
 }
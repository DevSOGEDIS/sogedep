<?php

namespace SOGEDEP\DAO;
use SOGEDEP\Domain\Client;

class ClientDAO extends DAO
 {
  public function findAll()
   {
    $sql = "SELECT * FROM utilisateurs WHERE role = 'CLIENT'";
    $result = $this->getDb()->fetchAll($sql);

    $clients = array();
    foreach ($result as $row)
     {
      $clientId = $row['id'];
      $clients[$clientId] = $this->buildDomainObject($row);
     }
    return $clients;
   }

  public function find($id)
   {
    $sql = "SELECT * FROM utilisateurs WHERE role = 'CLIENT' AND id = ?";
    $row = $this->getDb()->fetchAssoc($sql, array($id));
    if($row)
     {
      return $this->buildDomainObject($row);
     }
    else
     {
      throw new \Exception("Aucun client ne correspond à cette demande");
     }
   }   

  protected function buildDomainObject(array $row)
   {
    $client = new Client();
    $client->setId($row['id']);
    $client->setComptesogedis($row['comptesogedis']);
    $client->setComptesogedep($row['comptesogedep']);
    $client->setComptecompta($row['comptecompta']);
    $client->setNom($row['nom']);
    $client->setPrenom($row['prenom']);
    $client->setAdresse1($row['adresse1']);
    $client->setAdresse2($row['adresse2']);
    $client->setAdresse3($row['adresse3']);
    $client->setCodepostal($row['codepostal']);
    $client->setVille($row['ville']);
    $client->setEmail($row['email']);
    $client->setInitiales($row['initiales']);
    $client->setPseudo($row['pseudo']);
    $client->setPassword($row['password']);
    $client->setTelephone($row['telephone']);
    $client->setSalt($row['salt']);
    $client->setRole($row['role']);
    return $client;
   }
 }
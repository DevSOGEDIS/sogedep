<?php

namespace SOGEDEP\DAO;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use SOGEDEP\Domain\User;

class UserDAO extends DAO implements UserProviderInterface
 {
  public function findAll()
   {
    $sql = "SELECT * FROM utilisateurs WHERE role != 'CLIENT' AND role != 'PRESTATAIRE'";
    $result = $this->getDb()->fetchAll($sql);

    $utilisateurs = array();
    foreach ($result as $row)
     {
      $utilisateurId = $row['id'];
      $utilisateurs[$utilisateurId] = $this->buildDomainObject($row);
     }
    return $utilisateurs;
   }

  public function find($id)
   {
    $sql = "SELECT * FROM utilisateurs WHERE id = ?";
    $row = $this->getDb()->fetchAssoc($sql, array($id));
    if($row)
     {
      return $this->buildDomainObject($row);
     }
    else
     {
      throw new \Exception("Aucun utilisateur ne correspond à cet id");
     }
   }   

  /**
   * {@inheritDoc}
   */
  public function loadUserByUsername($email)
   {
    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $row = $this->getDb()->fetchAssoc($sql, array($email));
    if($row)
     {
      return $this->buildDomainObject($row);
     }
    else
     {
      throw new UsernameNotFoundException(sprintf('Aucun utilisateur ne correspond à cet email'));
     }
   }
   
  /**
   * {@inheritDoc}
   */
  public function refreshUser(UserInterface $user)
   {
    $class = get_class($user);
    if(!$this->supportsClass($class))
     {
      throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
     }
    return $this->loadUserByUsername($user->getUsername());
   }

  /**
   * {@inheritDoc}
   */
  public function supportsClass($class)
   {
    return 'SOGEDEP\Domain\User' === $class;
   }

  protected function buildDomainObject(array $row)
   {
    $user = new User();
    $user->setId($row['id']);
    $user->setComptesogedis($row['comptesogedis']);
    $user->setComptesogedep($row['comptesogedep']);
    $user->setComptecompta($row['comptecompta']);
    $user->setNom($row['nom']);
    $user->setPrenom($row['prenom']);
    $user->setAdresse1($row['adresse1']);
    $user->setAdresse2($row['adresse2']);
    $user->setAdresse3($row['adresse3']);
    $user->setCodepostal($row['codepostal']);
    $user->setVille($row['ville']);
    $user->setEmail($row['email']);
    $user->setPassword($row['password']);
    $user->setTelephone($row['telephone']);
    $user->setSalt($row['salt']);
    $user->setRole($row['role']);
    return $user;
   }
 }
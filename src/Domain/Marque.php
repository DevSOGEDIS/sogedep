<?php

namespace SOGEDEP\Domain;

class Marque 
 {
  /**
   * Marque id.
   *
   * @var integer
   */
  private $id;

  /**
   * Marque marque.
   *
   * @var string
   */
  private $marque;

  public function getId()
   {
    return $this->id;
   }

  public function setId($id)
   {
    $this->id = $id;
    return $this;
   }

  public function getMarque()
   {
    return $this->marque;
   }

  public function setMarque($marque)
   {
    $this->marque = $marque;
    return $this;
   }   

 }
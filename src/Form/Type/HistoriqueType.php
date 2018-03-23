<?php

namespace SOGEDEP\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class HistoriqueType extends AbstractType
 {
  public function buildForm(FormBuilderInterface $builder, array $options)
   {
    $builder->add('commentaire', TextareaType::class);
   }

  public function getName()
   {
    return 'comment';
   }
 }
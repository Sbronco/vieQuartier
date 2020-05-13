<?php

namespace App\Form;

use App\Entity\Noter;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('noteTourisme')
            ->add('noteTransport')
            ->add('noteLoisir')
            ->add('noteQualiteVie')
            ->add('noteComServ')
            ->add('noteEducation')
            ->add('noteServicePublique')
            ->add('notePopulation')
            ->add('noteGlobal')
            ->add('idRegion',EntityType::class,array('class'=>'App\Entity\Region','choice_label'=>'nomRegion'))
           /*->add('idVille',EntityType::class, array(
                'class'=>'App\Entity\Ville',
                'choice_label' => 'id',
                'expanded'=>false,
                'multiple'=>false))
           */
           ->add('idVille',EntityType::class,array('class'=>'App\Entity\Ville','choice_label'=>'nomVille'))

            ->add('idUser',EntityType::class,array('class'=>'App\Entity\User','choice_label'=>'nom'))
            ;



    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Noter::class,
        ]);
    }
}

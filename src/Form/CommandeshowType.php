<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Commandeshow;
use App\Entity\Showroom;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeshowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intituleshow',TextType::class,array(
        'label' => 'Intitulé de la commande',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez l\'intitulé de la commande']
    ))

            ->add('datecomshow',DateType::class,array(
        'label' => 'Date de commande',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez la date de commande']
    ))
          /*  ->add('reference')*/
            ->add('fournisseurshow',TextType::class,array(
                'label' => 'Nom du distributeur Ask SA',
              'required'  => false,
              'attr'      =>['placeholder'    =>  'Saisissez le distributeur de Ask SA']
          ))

            ->add('showroom', EntityType::class, [
                'class' => Showroom::class,
                'choice_label' => 'nomshow',
                'required'  => false,
                'placeholder' => 'Sélectionnez une showroom',
            ])
            /*  ->add('slug')
            ->add('editedOn')
            ->add('creditedOn')
            ->add('editedBy')
            ->add('createdBy')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commandeshow::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Fournisseur;
use App\Entity\Produit;
use App\Entity\Commande;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule', TextType::class, array(
                'label'     => 'Intitulé :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez l\'intitulé']
            ))


            ->add('description', TextareaType::class, array(
                'label'     => 'Description de la commande :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une description']
            ))

            ->add('fournisseur', EntityType::class,[
               'class' => Fournisseur::class,
               'choice_label' => 'nomcomplet',
               'required'  => false,
               'placeholder' => 'Sélectionnez un fournisseur',
           ])
               ->add('datecommande',DateType::class,array(
                   'label'     => 'date de la commande :',
                   'required'  => false,
                   'attr'      =>['placeholder'    =>  'Saisissez la date montant'],

               ))

          /*  ->add('createdOn')
            ->add('editedOn')
            ->add('slug')

            ->add('createdBy')
            ->add('editedBy')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}

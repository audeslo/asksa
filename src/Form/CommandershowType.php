<?php

namespace App\Form;

use App\Entity\Commandershow;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandershowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('capacitecartonshow',IntegerType::class,array(
        'label'     => 'Bidon/Carton :',
        'required'  => false,

    ))
            ->add('capacitebidonshow',IntegerType::class,array(
                'label'     => 'Quantite/Bidon (Litre) :',
                'required'  => false,

            ))
            ->add('quantitecommandeshow',IntegerType::class,array(
                'label'     => 'Nombre de cartons :',
                'required'  => false,

            ))
            /* ->add('quantitestock')
           ->add('etat')
            ->add('slug')
            ->add('editedOn')
            ->add('createdOn')
            ->add('editedBy')
            ->add('createdBy')*/
            ->add('produit', EntityType::class, [
                'class' => Produit::class,
                'choice_label'  => 'designation',
                'label'         =>  'Produit :',
                'required'      => false,
                'placeholder'   => 'Sélectionnez un produit',
            ])
            /*  ->add('commandeshow')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commandershow::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Commandershow;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandershowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('capacitecartonshow')
            ->add('capacitebidonshow')
            ->add('quantitecommandeshow')
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

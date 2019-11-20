<?php

namespace App\Form;

use App\Entity\Commandershow;
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
            ->add('quantitestock')
            ->add('etat')
            ->add('slug')
            ->add('editedOn')
            ->add('createdOn')
            ->add('editedBy')
            ->add('createdBy')
            ->add('produit')
            ->add('commande')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commandershow::class,
        ]);
    }
}

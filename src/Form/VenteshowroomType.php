<?php

namespace App\Form;

use App\Entity\Venteshowroom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VenteshowroomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference')
            ->add('datevente')
            ->add('quantitecarton')
            ->add('capacitebidon')
            ->add('quantiteachete')
            ->add('slug')
            ->add('editedOn')
            ->add('createdOn')
            ->add('editedBy')
            ->add('createdBy')
            ->add('produit')
            ->add('client')
            ->add('stockshowroom')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Venteshowroom::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Modereglement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModereglementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
           /* ->add('slug')
            ->add('editedOn')
            ->add('createdOn')
            ->add('editedBy')
            ->add('createdBy')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Modereglement::class,
        ]);
    }
}

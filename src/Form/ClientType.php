<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('referent')
            ->add('nomcomplet')
            ->add('adresserue')
            ->add('type')
            ->add('telephone')
            ->add('ville')
            ->add('codepostal')
            ->add('mail')
            ->add('slug')
            ->add('createdOn')
            ->add('editedOn')
            ->add('createdBy')
            ->add('editedBy')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}

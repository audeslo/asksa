<?php

namespace App\Form;

use App\Entity\Fournisseur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FournisseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomcourt')
            ->add('nomcomplet')
            ->add('representant')
            ->add('Adresserue')
            ->add('telephone')
            ->add('Ville')
            ->add('Pays')
            ->add('Codepostal')
            ->add('Mail')
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
            'data_class' => Fournisseur::class,
        ]);
    }
}

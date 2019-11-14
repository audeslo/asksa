<?php

namespace App\Form;

use App\Entity\Tarifcategorieclt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TarifcategoriecltType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant')
            ->add('bornesupperieur')
            ->add('observation')
            ->add('borneinferieure')
           ->add('categorie')

           /*  ->add('categorie',EntityType::class, array(
                'class' => 'Bundle:Categorie',
                'choice_label' => 'libelle',
                'placeholder' => 'Sélectionnez une categorie',
            ))*/

            ->add('produit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tarifcategorieclt::class,
        ]);
    }
}

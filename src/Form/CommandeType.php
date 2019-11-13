<?php

namespace App\Form;

use App\Entity\Commande;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule',TextType::class,array(
                'label'     => 'Intitule :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez son intitule']

            ))
            ->add('datecommande')
            ->add('description')
            ->add('createdOn')
            ->add('editedOn')
            ->add('slug')
            ->add('produit')
            ->add('fournisseur')
            ->add('createdBy')
            ->add('editedBy')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}

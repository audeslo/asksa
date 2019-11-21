<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Commandeclient;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeclientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantitecommande')
            ->add('referencecommande')
            /*->add('clientcommande', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'type',
            ])*/
            ->add('produitclient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commandeclient::class,
        ]);
    }
}

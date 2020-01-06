<?php

namespace App\Form;

use App\Entity\Capacite;
use App\Entity\Produit;
use App\Entity\Commander;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommanderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('capacite',EntityType::class,array(
                'class'     => Capacite::class,
                'label'     => 'capacité :',
                'required'  => false,
                 ))

            ->add('quantitecommandee',IntegerType::class,array(
                'label'=> 'Quantité de carton :',
                'required' => false ,
            ))
            ->add('produit', EntityType::class, [
                'class' => Produit::class,
                'choice_label'  => 'designation',
                'label'         =>  'Produit :',
                'required'      => false,
                'placeholder'   => 'Sélectionnez un produit',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commander::class,
        ]);
    }
}

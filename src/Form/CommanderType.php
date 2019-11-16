<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Commander;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommanderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('capacitecarton',TextType::class,array(
        'label'     => 'Capacite du carton :',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez la capacite du carton']
    ))
            ->add('capacitebidon',TextType::class,array(
        'label'     => 'capacite du bidon :',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez la capacite du bidon']
    ))
           /* ->add('capacite',TextType::class,array(
                'label'=> 'Capacité',
                'required' => false ,
                'attr'      =>['placeholder'    =>  'Saisissez le code bar du produit']
            ))*/

            ->add('reference',TextType::class,array(
                'label'     => 'reference :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la reference']
    ))
            ->add('produit', EntityType::class, [
                'class' => Produit::class,
                'choice_label' => 'designation',
                'required'  => false,
                'placeholder' => 'Sélectionnez un produit',
            ])
            ->add('commande')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commander::class,
        ]);
    }
}

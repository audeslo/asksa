<?php

namespace App\Form;

use App\Entity\Client;

use App\Entity\Produit;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VenteshowroomEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('quantitecarton',IntegerType::class,array(
        'label'     => 'Capacite carton :',
        'required'  => true,

    ))
            ->add('capacitebidon',IntegerType::class,array(
        'label'     => 'Capacité bidon:',
        'required'  => true,
        'attr'      =>['placeholder'    =>  'Saisissez la capacité du bidon']
    ))



            ->add('quantiteachete',IntegerType::class,array(
        'label'     => 'Quantité a acheté :',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez la quantité']
    ))
            ->add('grosdetail',ChoiceType::class,array(
                'choices'  => array(
                    'Carton' => 1,
                    'Bidon' => 0,
                ),
                'label'     => 'Veuillez choisir l\'option:',
                'expanded' => true,
                'multiple' => false,
            ))

            ->add('produit',EntityType::class, [
        'class' => Produit::class,
        'choice_label' => 'designation',
        'required'  => false,
        'placeholder' => 'Sélectionnez le produit',
    ])
            /*->add("submit", SubmitType::class,array(
                'label' =>  "Ajouter",
                "attr"  => ["class" => "btn btn-success"]
            ))*/

        ;
    }

   /* public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Venteshowroom::class,
        ]);
    }*/
}

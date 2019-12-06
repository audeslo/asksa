<?php

namespace App\Form;

use App\Entity\Tarifcategorieclt;
use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TarifcategoriecltType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant',IntegerType::class,array(
                'label'     => 'Montant :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le montant']
            ))
            ->add('observation',TextareaType::class,array(
                'label'     => 'Observation :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Aviez vous une observation']
            ))

            ->add('bornesupperieur',IntegerType::class,array(
                'label'     => 'Borne suppérieure :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la borne supérieure']
            ))

            ->add('borneinferieure',IntegerType::class,array(
                'label'     => 'Borne inférieure :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la borne inférieure']
            ))


            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'libelle',
                'required'  => false,
                'placeholder' => 'Sélectionnez une categorie',
            ])


                ->add('produit', EntityType::class, [
                        'class' => Produit::class,
                        'choice_label' => 'designation',
                         'required'  => false,
                         'placeholder' => 'Sélectionnez un produit',
            ])

            ->add('litre', IntegerType::class, [
                'label' => 'Capacité du bidon',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la quantite']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tarifcategorieclt::class,
        ]);
    }
}

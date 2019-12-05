<?php

namespace App\Form;

use App\Entity\Client;

use App\Entity\Produit;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Venteshowroom;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VenteshowroomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          /*  ->add('reference')*/
            ->add('datevente')
            ->add('quantitecarton',IntegerType::class,array(
        'label'     => 'capacite carton :',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez la capacité du carton']
    ))
            ->add('capacitebidon',IntegerType::class,array(
        'label'     => 'capacaité bidon:',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez la capacité du bidon']
    ))
            ->add('modereglement', ChoiceType::class, array(
                'choices'     =>['Par espèce' => '1',
                                 'Par chèque' => '2',
                                  'Par virement'=> '3'],
                'label'     => 'modereglement :',
                'required'  => false,
                'placeholder'    =>  'Selectionner le mode de règlement '
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

            ->add('quantiteachete',IntegerType::class,array(
        'label'     => 'Quantité a acheté :',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez la quantité']
    ))

            ->add('produit',EntityType::class, [
        'class' => Produit::class,
        'choice_label' => 'designation',
        'required'  => false,
        'placeholder' => 'Sélectionnez le produit',
    ])

            ->add('client',EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'identifiant1',
                'required'  => false,
                'placeholder' => 'Sélectionnez un client',
            ])

            /* ->add('stockshowroom')
                 ->add('slug')
             ->add('editedOn')
             ->add('createdOn')
             ->add('editedBy')
             ->add('createdBy')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Venteshowroom::class,
        ]);
    }
}

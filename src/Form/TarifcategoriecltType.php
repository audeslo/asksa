<?php

namespace App\Form;

use App\Entity\Tarifcategorieclt;
use App\Entity\Produit;
use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TarifcategoriecltType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant',TextType::class,array(
                'label'     => 'montant :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le montant']
            ))
            ->add('bornesupperieur')
            ->add('observation')
            ->add('borneinferieure')
           ->add('categorie')

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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tarifcategorieclt::class,
        ]);
    }
}

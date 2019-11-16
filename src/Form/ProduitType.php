<?php

namespace App\Form;

use App\Entity\Produit;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference',TextType::class,array(
                        'label'     => 'Reference:',
                        'required'  => false,
                        'attr'      =>['placeholder'    =>  'Saisissez la référence']
            ))
            ->add('designation',TextType::class,array(
                'label' => 'Designation :',
                'required' => false,
                'attr'   =>['placeholder'  => 'Saisissez la désignation']
            ))
            ->add('prixU',TextType ::class,array(
                         'label' => 'Prix unitaire :',
                         'required' => false,
                         'attr'   =>['placeholder'  => 'Saisissez le prix unitaire']

            ))
            ->add('description',TextareaType::class,array(
                'label' => 'Description :',
                'required' => false,
                'attr'   =>['placeholder'  =>   'Saisissez la description']
    ))

            ->add('categprod', ChoiceType::class, array(
                'choices'     =>['lubrifiant' => 'lubrifiant',
                    'Graisse' => 'Graisse'],
                     'label'     => 'Catégorie de produit :',
                     'required'  => false,
                     'placeholder'    =>  'Selectionner une catégorie '
            ))
            ->add('prixventeconseiller',TextType::class,array(
                'label' => 'Prix de vente conseillé :',
                'required' => false,
                'attr'   =>['placeholder'  =>   'Saisissez le prix de vente conseille']
    ))
            ->add('marque', ChoiceType::class, array(
                'choices'     =>['lubrifiant' => 'lubrifiant',
                    'Graisse' => 'Graisse'],
                'label'     => 'Marque de produit :',
                'required'  => false,
                'placeholder'    =>  'Selectionner une marque '
            ))
            /*->add('editedById')
            ->add('slug')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}

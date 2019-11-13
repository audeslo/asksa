<?php

namespace App\Form;

use App\Entity\Produit;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
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
            ->add('description',TextType::class,array(
                'label' => 'Description :',
                'required' => false,
                'attr'   =>['placeholder'  =>   'Saisissez la description']



    ))

           /* ->add('createdOn')
            ->add('editedOn')
            ->add('createdById')
            ->add('editedById')
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

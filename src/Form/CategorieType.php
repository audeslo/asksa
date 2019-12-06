<?php

namespace App\Form;

use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle',TextType::class,array(
        'label'=>'Libellé :',
        'required' => false,
        'attr'   =>['placeholder'  => 'Saisissez la catégorie']
    ))
            ->add('description',TextareaType::class,array(
        'label'=>'Description :',
        'required' => false,
        'attr'   =>['placeholder'  => 'Saisissez une description de la catégorie']
    ))
        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Categorie::class,
        ]);
    }
}

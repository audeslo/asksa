<?php

namespace App\Form;

use App\Entity\Fournisseur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FournisseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nomcourt', TextType::class, array(
                'label'     => 'Nom court (sigle) :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le sigle']
            ))
            ->add('nomcomplet', TextType::class, array(
                'label'     => 'Nom complet :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom complet']
            ))
            ->add('representant', TextType::class, array(
                'label'     => 'Representant :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom du representant']
            ))
            ->add('telephone', TextType::class, array(
                'label'     => 'Téléphone :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le Téléphone']
            ))
            ->add('adresserue', TextType::class, array(
                'label'     => 'Adresse rue :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez l\'adresse rue']
            ))
            ->add('ville', TextType::class, array(
                'label'     => 'Titre :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez l\'adresse ville'],
                'help'      => '0022996979899'
            ))
            ->add('mail', TextType::class, array(
                'label'     => 'Titre :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez l\'email']
            ))

            ->add('description', TextareaType::class, array(
                'label'     => 'Description :',
                'required'  => false,
                'attr'      =>[
                    'placeholder'       =>  'Saisissez le description',
                    'class'             =>  'ckeditor'
                ]

            ))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fournisseur::class,
        ]);
    }
}

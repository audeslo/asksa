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
            ->add('nomcourt',TextType::class,array(
                'label'     => 'Société :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom court']
            ))

            ->add('nomcomplet',TextType::class,array(
                       'label'     => 'Nom complet :',
                       'required'  => false,
                       'attr'      =>['placeholder'    =>  'Saisissez le nom complet']
    ))
            ->add('representant',TextType::class,array(
        'label'     => 'Représentant :',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez le nom du représentant']
    ))
            ->add('adresserue',TextType::class,array(
                'label'     => 'Adresse rue :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une adresse valide']
            ))


            ->add('ville',TextType::class,array(
                'label'     => 'Ville :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une ville']
            ))
            ->add('pays',TextType::class,array(
                'label'     => 'Pays :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez un pays']
            ))
            ->add('telephone',TextType::class,array(
                'label'     => 'Téléphone :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez un numero de telephone']
            ))
            ->add('description',TextareaType::class,array(
                'label'     => 'Description :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une description']
            ))
            ->add('codepostal',TextType::class,array(
                'label'     => 'Code postal :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez un code postal']
            ))
            ->add('mail',TextType::class,array(
                'label'     => 'Mail:',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez un mail valide']
            ))
            /* ->add('slug')
             ->add('createdOn')
             ->add('editedOn')
             ->add('createdBy')
             ->add('editedBy')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fournisseur::class,
        ]);
    }
}

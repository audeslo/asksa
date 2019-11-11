<?php

namespace App\Form;

use App\Entity\Fournisseur;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FournisseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomcourt',TextType::class,array(
                'label'     => 'Nomcourt :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom court']
            ))

            ->add('nomcomplet',TextType::class,array(
                       'label'     => 'Nomcomplet :',
                       'required'  => false,
                       'attr'      =>['placeholder'    =>  'Saisissez le nom complet']
    ))
            ->add('representant',TextType::class,array(
        'label'     => 'Representant :',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez le nom du representant']
    ))
            ->add('adresserue',TextType::class,array(
                'label'     => 'Adresserue :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une adresse valide']
            ))


            ->add('ville',TextType::class,array(
                'label'     => 'Ville:',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une ville']
            ))
            ->add('pays',TextType::class,array(
                'label'     => 'Pays:',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez un pays']
            ))
            ->add('telephone',TextType::class,array(
                'label'     => 'Telephone:',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez un numero de telephone']
            ))
            ->add('description',TextType::class,array(
                'label'     => 'Description:',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une description']
            ))
            ->add('codepostal',TextType::class,array(
                'label'     => 'Code postal:',
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

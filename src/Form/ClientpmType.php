<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientpmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('referent', TextType::class, array(
                'label'     => 'Réferent :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le referent']
            ))

            ->add('raisonsociale', TextType::class, array(
                'label'     => 'Raison sociale :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom ']
            ))

            ->add('ifu', TextType::class, array(
                'label'     => 'N° IFU:',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom ']
            ))


            ->add('adresserue', TextType::class, array(
                'label'     => 'Adresse rue :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la ville']
            ))

            ->add('telephone', TextType::class, array(
                'label'     => 'Tél.Portable :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le sigle']
            ))
            ->add('ville', TextType::class, array(
                'label'     => 'Ville :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le sigle']
            ))
            ->add('codepostal', TextType::class, array(
                'label'     => 'Code postal :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le sigle']
            ))
            ->add('mail', TextType::class, array(
                'label'     => 'E-mail :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le sigle']
            ))

            ->add('pays', TextType::class, array(
                'label'     => 'Pays :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le pays']
            ))

            ->add('telfixe', TextType::class, array(
                'label'     => 'Téléphone fixe :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le telephone']
            ))

            ->add('personnecontact', TextType::class, array(
                'label'     => 'Personne à contacter :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom de la personne']
            ))

            ->add('numerocompte', TextType::class, array(
                'label'     => 'Numero bancaire :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez un bancaire valide']
            ))

            ->add('description', TextType::class, array(
                'label'     => 'Description du client :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une bref description']
            ))
        ;


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
            //'compound'  => true
        ]);
    }
}

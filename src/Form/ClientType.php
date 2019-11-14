<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('referent', TextType::class, array(
                'label'     => 'Réferent :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le referent']
            ))


            ->add('civilite', ChoiceType::class, array(
                'choices'     =>['Mr' => 'Mr',
                    'Mme' => 'Mme'],
                'label'     => 'Civilité :',
                'required'  => false,
                'placeholder' => 'Sélectionnez un client',
            ))


            ->add('nomcomplet', TextType::class, array(
                'label'     => 'Nom complet :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom complet']
            ))
            ->add('adresserue', TextType::class, array(
                'label'     => 'Réseaux sociaux (twitter, facebook,skype... ) :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la ville']
            ))
            ->add('type', ChoiceType::class, array(
                'choices'     =>['Personne Morale' => 'Personne Morale',
                    'Personne Physique' => 'Personne Physique']
                ,
                'label'     => 'Type du client :',
                'required'  => false,
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

          /*  ->add('vue', TextType::class, array(
                'label'     => 'Numero bancaire :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez un bancaire valide']
            ))*/

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
        ]);
    }
}

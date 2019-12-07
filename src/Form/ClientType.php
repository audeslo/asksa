<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Client;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder



            ->add('civilite', ChoiceType::class, array(
                'choices'     =>['M.' => 'M.',
                    'Mme' => 'Mme'],
                'label'     => 'Civilité :',
                'required'  => false,
                'placeholder'    =>  'Selectionner la civilité '
            ))


            ->add('identifiant1', TextType::class, array(
                'label'     => 'Nom :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom ']
            ))

            ->add('identifiant2', TextType::class, array(
                'label'     => 'Prénoms :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le prénom ']
            ))

            ->add('adresserue', TextType::class, array(
                'label'     => 'Adresse des réseaux sociaux (Twitter,facebook ) : :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une adresse de réseau ']
            ))

            ->add('telephone', TextType::class, array(
                'label'     => 'Tél.Portable :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le numero de telephone']
            ))
            ->add('ville', TextType::class, array(
                'label'     => 'Ville :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la ville']
            ))
            ->add('codepostal', TextType::class, array(
                'label'     => 'Code postal :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le code postal']
            ))
            ->add('mail', TextType::class, array(
                'label'     => 'E-mail :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une adresse electronique']
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
                'attr'      =>['placeholder'    =>  'Saisissez le nom de la personne à contacter']
            ))

            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'libelle',
                'required'  => false,
                'placeholder' => 'Sélectionnez une catégorie',
            ])

            ->add('description', TextareaType::class, array(
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

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

class ClientpmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('identifiant1', TextType::class, array(
                'label'     => 'Raison sociale :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la raison sociale ']
            ))

            ->add('identifiant2', TextType::class, array(
                'label'     => 'N° IFU:',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le numero IFU ']
            ))


            ->add('adresserue', TextType::class, array(
                'label'     => 'Adresse des réseaux sociaux (Twitter,facebook ) :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une adresse de reseau']
            ))

            ->add('telephone', TextType::class, array(
                'label'     => 'Tél.Portable :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le numero de télephone']
            ))
            ->add('ville', TextType::class, array(
                'label'     => 'Ville :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la ville']
            ))
            ->add('codepostal', TextType::class, array(
                'label'     => 'Code postal :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez un code postal']
            ))
            ->add('mail', TextType::class, array(
                'label'     => 'E-mail :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une adresse électronique']
            ))

            ->add('pays', TextType::class, array(
                'label'     => 'Pays :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le pays']
            ))

            ->add('telfixe', TextType::class, array(
                'label'     => 'Téléphone fixe :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le téléphone']
            ))

            ->add('personnecontact', TextType::class, array(
                'label'     => 'Personne à contacter :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom de la personne']
            ))

            ->add('numerocompte', TextType::class, array(
                'label'     => 'Numéro bancaire :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez un bancaire valide']
            ))

            ->add('description', TextareaType::class, array(
                'label'     => 'Description de la société :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez une bref description']
            ))

            ->add('society', ChoiceType::class, array(
                'choices'     =>['Société à responsabilité limitée (SARL)' => 'SARL',
                    'Société anonyme (SA)' => ' SA',
                    'Entreprise unipersonnelle à responsabilité limitée (EURL) ' => 'EURL',
                    'Société d\'exercice libéral à responsabilité limitée (SELARL)' => ' SELARL',
                    'Société par actions simplifiée (SAS)' => 'SAS',
                    'Société par actions simplifiée unipersonnelle (SASU)' => 'SASU',
                    'Société civile professionnelle (SCP)' => 'SCP',
                    'Société en nom collectif (SNC)' => 'SNC'],
                    'label'     => 'Société:',
                     'required'  => false,
                      'placeholder' => 'Sélectionnez la société',
            ))

            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'libelle',
                'required'  => false,
                'label'     => 'Catégorie :',
                'placeholder' => 'Sélectionnez une catégorie',
            ])
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

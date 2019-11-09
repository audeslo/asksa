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
            ->add('nomcomplet', TextType::class, array(
                'label'     => 'Nom complet :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom complet']
            ))
            ->add('adresserue', TextType::class, array(
                'label'     => 'Adresse rue :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le sigle']
            ))
            ->add('type', ChoiceType::class, array(
                'choices'     =>['Personne Morale' => 'Personne Morale',
                    'Personne Physique' => 'Personne Physique']
                ,
                'label'     => 'Type du client :',
                'required'  => false,
            ))
            ->add('telephone', TextType::class, array(
                'label'     => 'Téléphone :',
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

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}

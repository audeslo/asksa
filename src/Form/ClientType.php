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
                'label'     => 'Referent :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le referent']
            ))
            ->add('nomcomplet', TextType::class, array(
                'label'     => 'le nom complet) :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom complet']
            ))
            ->add('adresserue', TextType::class, array(
                'label'     => 'adresse rue :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le sigle']
            ))
            ->add('type', ChoiceType::class, array(
                'choices'     => array(['Personne Morale' => 'Personne Morale'],
                                        ['Personne Physique' => 'Personne Physique']
                    ),
                'label'     => 'Type du client :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le sigle']
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
                'label'     => 'code postal :',
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

<?php

namespace App\Form;

use App\Entity\Showroom;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('showroom', EntityType::class, [
                'class' => Showroom::class,
                'choice_label'  => 'nomshow',
                'label'         =>  'Showroom :',
                'required'      => false,
                'placeholder'   => 'Sélection showroom',
            ])
            ->add('nom', TextType::class, array(
                'label'     => 'Nom :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le nom']
            ))
            ->add('prenom', TextType::class, array(
                'label'     => 'Prénom :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le prénom']
            ))
            ->add('sexe', ChoiceType::class, array(
                'choices'   => ['Masculin' => 'M', 'Féminin'   =>  'F'],
                'expanded'  => true,
                'label'     => 'Sexe: ',
            ))
            ->add('telephone', TextType::class, array(
                'label'     => 'Téléphone :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le N° Tél']
            ))
            ->add('email', EmailType::class, array(
                'label'     => 'E-Mail:  :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez votre mail']
            ))
            ->add('username', TextType::class, array(
                'label'     => 'login/nom utilisateur :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez le login']
            ))
            ->add('password', RepeatedType::class, array(
                'type'     => PasswordType::class,
                'first_options'         => array('label'   => 'Password'),
                'second_options'        =>['label'    =>  'Répéter le mot de Password']
            ))
            ->add('roles', ChoiceType::class, array(
                'choices'   => ['Utilisateur' =>'ROLE_USER' ,'Administrateur' => 'ROLE_ADMIN' ],
                'label'     => 'Roles :',
                'required'  => false,
                'multiple'  => true,
                'expanded'  => true,

            ))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
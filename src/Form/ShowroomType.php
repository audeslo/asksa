<?php

namespace App\Form;

use App\Entity\Showroom;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShowroomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nomshow',TextType::class,array(
                'label'=>'Nom du show rooms :',
                'required' => false,
                'attr'   =>['placeholder'  => 'Saisissez le nom du show rooms']
            ))
            ->add('quartier',TextType::class,array(
                'label'=>'Quartier / Ville :',
                'required' => false,
                'attr'   =>['placeholder'  => 'Saisissez le nom du quartier / ville']
            ))
            ->add('telephone',TextType::class,array(
               'label'=>'Téléphone :',
                'required' => false,
                'attr'   =>['placeholder'  => 'Saisissez le numéro ']
    ))
            ->add('representant',TextType::class,array(
                'label'=>'Nom d\'un représentant :',
                'required' => false,
                'attr'   =>['placeholder'  => 'Saisissez le nom d\'un représentant']
            ))
            ->add('tel',TextType::class,array(
                'label'=>'Téléphone du représenatnt :',
                'required' => false,
                'attr'   =>['placeholder'  => 'Saisissez le nom de téléphone du représentant']
            ))
            ->add('mail',TextType::class,array(
                'label'=>'E-mail:',
                'required' => false,
                'attr'   =>['placeholder'  => 'Saisissez l\'émail du représentant']
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Showroom::class,
        ]);
    }
}

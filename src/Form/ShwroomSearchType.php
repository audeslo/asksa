<?php

namespace App\Form;

use App\Entity\Showroom;
use App\Entity\ShowroomSearch;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShwroomSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('showroom', EntityType::class, [
                'class' => Showroom::class,
                'choice_label'  => function($search){
                    return $search->getId() . ' - ' . $search->getNomshow();
                },
                'label' => 'Le showroom',

                'placeholder' => 'Sélectionnez le showroom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ShowroomSearch::class,
            'method'    => 'get',
            'csrf_protection'   => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}

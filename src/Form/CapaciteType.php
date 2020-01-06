<?php

namespace App\Form;

use App\Entity\Capacite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CapaciteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle',TextType::class,array(
                'label'=>'Libellé :',
                'required' => false,
                'attr'   =>['placeholder'  => 'Saisissez un libellé']
            ))
            ->add('capacitecarton',IntegerType::class,array(
                'label'     => 'Capacité du carton :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la capacité du carton']
            ))

            ->add('capacitebidon',IntegerType::class,array(
                'label'     => 'Capacité du bidon :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la capacité du bidon']
            ))

            ->add('description',TextareaType::class,array(
                'label'=>'Description :',
                'required' => false,
                'attr'   =>['placeholder'  => 'Saisissez une description']
            ))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Capacite::class,
        ]);
    }
}

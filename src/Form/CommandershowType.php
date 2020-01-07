<?php

namespace App\Form;

use App\Entity\Capacite;
use App\Entity\Commandershow;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandershowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('produit', EntityType::class, [
                'class' => Produit::class,
                'choice_label'  => 'designation',
                'label'         =>  'Produit :',
                'required'      => false,
                'placeholder'   => 'Sélectionnez un produit',
            ])

            ->add('quantitecommandeshow',IntegerType::class,array(
                'label'     => 'Quantité de cartons :',
                'required'  => false,

            ))

            ->add('capacite', EntityType::class, [
                'class'     =>Capacite::class,
                'choice_label'  => 'code',
                'label'         =>  'Capacité :',
                'required'      => false,
            ])
            /*  ->add('commandeshow')*/
        ;

        /*$builder->get('produit')->addEventListener(
            FormEvents::POST_SUBMIT,
            static function (FormEvent $event) {
                $form = $event->getForm();
                $form->getParent()

                    ->add('capacite', EntityType::class, array(
                        'label' => 'Capacité:*',
                        'class' => Capacite::class,
                        'placeholder' => 'Veuillez sélectionner la capacité',
                        'choices' => $form->getData() ? $form->getData()->getClasse() : [],
                        'required' => false
                    ))
                    ->add('quantitecommandeshow',IntegerType::class,array(
                        'label'     => 'Quantité de cartons :',
                        'required'  => false,
                    ))
                ;
            }
        );*/



    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commandershow::class,
        ]);
    }
}

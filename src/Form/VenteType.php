<?php

namespace App\Form;

use App\Entity\Vente;
use App\Entity\Client;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VenteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          /*  ->add('reference')*/
          ->add('client', EntityType::class, [
              'class' => Client::class,
              'choice_label' => 'identifiant1',
              'required'  => false,
              'placeholder' => 'Sélectionnez le client',
          ])
            ->add('datevente',DateType::class,array(
                'label'     => 'Date de la facture :',
                'required'  => false,
                'attr'      =>['placeholder'    =>  'Saisissez la date '],

            ))
        /*    ->add('slug')
            ->add('editedOn')
            ->add('createdOn')*/

           /* ->add('editedBy')
            ->add('createdBy')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vente::class,
        ]);
    }
}

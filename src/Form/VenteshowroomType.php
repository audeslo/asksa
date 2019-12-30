<?php

namespace App\Form;

use App\Entity\Client;

use App\Entity\Produit;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Venteshowroom;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VenteshowroomType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
          /*  ->add('reference')*/
            ->add('datevente',DateType::class,array(
        'label' => 'Date de facture',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez la date de commande']
    ))

            ->add('quantitecarton',ChoiceType::class,array(
            'label'     => 'Capacite carton :',
            'choices'   => $options['carton'],
            'required'  => true,

    ))
            ->add('capacitebidon',ChoiceType::class,array(
            'label'     => 'Capacité bidon:',
        'choices'      => $options['bidon'],
        'required'  => true,
        'attr'      =>['placeholder'    =>  'Saisissez la capacité du bidon']
    ))
            ->add('modereglement', ChoiceType::class, array(
                'choices'     =>['Par espèce' => '1',
                                 'Par chèque' => '2',
                                  'Par virement'=> '3'],
                'label'     => 'Mode de règlement :',
                'required'  => true,
                'placeholder'    =>  'Sélectionner le mode de règlement '
            ))

            ->add('grosdetail',ChoiceType::class,array(
                'choices'  => array(
                    'Carton' => 1,
                    'Bidon' => 0,
                ),
                'label'     => 'Veuillez choisir l\'option:',
                'expanded' => true,
                'multiple' => false,
            ))

            ->add('quantiteachete',IntegerType::class,array(
        'label'     => 'Quantité a acheté :',
        'required'  => false,
        'attr'      =>['placeholder'    =>  'Saisissez la quantité']
    ))

            ->add('produit',ChoiceType::class, [
                    'required' =>   true,
                    'placeholder'   => 'Veuillez sélectionner un produit',
                    'choices'       => $options['produits'],
                    /*'query_builder' => function (EntityRepository $rp, $option) {
                        return $rp->createQueryBuilder('p')
                            ->join('p.commandershows','cs')
                            ->join('cs.commandeshow','c')
                            ->join('c.showroom','sh')
                            ->join('sh.users','us')
                            ->where('st.vendu = 0')
                            ->andWhere('us.id = ?1')
                            ->setParameter(1,$option['carton'])
                            ->orderBy('p.designation', 'ASC');
                    },*/
                    'attr' => ['data-select' => 'true']
            ])

            ->add('client',EntityType::class, [
                'class' => Client::class,
                'choice_label' => function($client){
                    return $client->getIdentifiant1().' '. $client->getIdentifiant2();
                },
                'required'  => false,
                'placeholder' => 'Sélectionnez un client',
                'attr' => ['data-select' => 'true']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Venteshowroom::class,
            'bidon'     => null,
            'carton'    => null,
            'produits'    => null
        ]);
    }
}

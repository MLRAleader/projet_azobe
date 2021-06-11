<?php

namespace App\Form;

use App\Entity\Organisation;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrganisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('denomination')
            ->add('sigle')
            ->add('statut_juridique')
            ->add('adresse')
            ->add('createdAt')
            ->add('numero_recepicee')
            ->add('province')
            ->add('ville')
            ->add('objet_social')
            ->add('description_activite')
            ->add('site_internet')
            ->add('lien_facebook')
            ->add('numero_telephone1')
            ->add('numero_telephone2')
            ->add('email_organisation')
            // ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Organisation::class,
        ]);
    }
}

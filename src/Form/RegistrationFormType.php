<?php

namespace App\Form;

use App\Entity\Province;
use App\Entity\StatutJuridique;
use App\Entity\User;
use App\Entity\Ville;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('lastname')
            ->add('firstname')
            ->add('phone_number')
            ->add('phone_number2')
            ->add('mail_contact2')
            ->add('social_objet')
            ->add('principal_activite')
            ->add('denomination')
            ->add('statut_juridique',  StatutJuridique::class)
            ->add('ville', Ville::class)
            ->add('province', Province::class)
            ->add('sigle')
            ->add('numero_recepisse')
            ->add('date_creation')
            ->add('adresse')
            ->add('site_internet')
            ->add('lien_facebook')
            ->add('passwordConfirm')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

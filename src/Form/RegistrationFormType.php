<?php

namespace App\Form;

use App\Entity\GroupeActivite;
use App\Entity\User;
use App\Repository\ThemeActiviteRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
            ->add('description_activite')
            ->add('groupe_activite', EntityType::class,[
                'class'=>'App\Entity\GroupeActivite',
                'placeholder'=>'Sélectionner un groupe d\'activité',
                'mapped'=> false,
                'required'=>true    

            ])
            ->add('denomination')
            ->add('statut_juridique',StatutJuridiqueFormType::class)
            ->add('ville')
            ->add('province', ProvinceFormType::class)
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
            ]);

            /**La partie qui ajoute le thème d'activité. */
            $builder->addEventListener(
                FormEvents::POST_SET_DATA,
                function(FormEvent $event){

                    $form = $event->getForm();
                    $groupe_activite = new GroupeActivite();
                    $groupe_activite = $event->getData('groupe_activite');//Les données de mon entité.

                  

                    //dump($groupe_activite);

                    $themeActivites  = null === $groupe_activite ? []:$groupe_activite->getThemeActivite();

                    $form->add('themeActivite', EntityType::class,[
                       'class'=>'App\Entity\ThemeActivite',
                       'placeholder'=>'Sélectionner un thème d\'activité',
                       'query_builder'=>function(ThemeActiviteRepository $themeActivites){
                           return $themeActivites->createQueryBuilder('myTheme')->orderBy('myTheme.name','ASC');
                            },
                         'choices'=>$themeActivites,
                        

                    ]);
                }
               );
        
               
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

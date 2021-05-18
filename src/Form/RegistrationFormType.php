<?php

namespace App\Form;

use App\Entity\GroupeActivite;
use App\Entity\ThemeActivite;
use App\Entity\User;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Validator\Constraints\Form;
use Symfony\Component\Form\Form as FormForm;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface as FormFormInterface;
use Symfony\Component\Form\Test\FormInterface;
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
           // ->add('recepicee', FileType::class)
            ->add('date_creation')
            ->add('adresse')
            ->add('site_internet')
            ->add('lien_facebook')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                'label'=>'Termes et Conditions d\'utilisation'
            ])
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'type'=>PasswordType::class,
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
                'first_options'  => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password']
            ]);

            /**La partie qui ajoute le thème d'activité. */
            // $builder->get('groupe_activite')->addEventListener(
            //     FormEvents::POST_SUBMIT,
            //     function (FormEvent $event){
            //         $form = $event->getForm();
            //         $this->addThemeActiviteField($form->getParent(), $form->getData());
            //     }
            // );

            
    }

    public function addThemeActiviteField(FormInterface $form, ?GroupeActivite $groupe_activite){
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'themeActivites',
            EntityType::class,
            null,
            [
              'class'           => 'AppBundle\Entity\themeActivites',
              'placeholder'     => $groupe_activite ? 'Sélectionnez votre Theme d\'activité' : 'Sélectionnez votre groupe d\'activité',
              'mapped'          => false,
              'required'        => false,
              'auto_initialize' => false,
              'choices'         => $groupe_activite ? $groupe_activite->getThemeActivites() : []
            ]
          );
        //   $builder->addEventListener(
        //     FormEvents::POST_SUBMIT,
        //     function (FormEvent $event) {
        //       $form = $event->getForm();
        //       $this->addActiviteField($form->getParent(), $form->getData());
        //     }
        //   );
        //   $form->add($builder->getForm());

        //   $builder->addEventListener(
        //     FormEvents::POST_SET_DATA,
        //     function (FormEvent $event) {
        //       $data = $event->getData();
        //       /* @var $ville Ville */
        //       $activites = $data->getActivites();
        //       $form = $event->getForm();
        //       if ($activites) {
        //         // On récupère le département et la région
        //         $themeActivites = $activites->getThemeActivites();
        //         $groupe_activite = $themeActivites->getGroupeActivites();
        //         // On crée les 2 champs supplémentaires
        //         $this->addThemeActiviteField($form, $groupe_activite);
        //         $this->addActiviteField($form, $themeActivites);
        //         // On set les données
        //         $form->get('groupe_activite')->setData($groupe_activite);
        //         $form->get('themeActivites')->setData($themeActivites);
        //       } else {
        //         // On crée les 2 champs en les laissant vide (champs utilisé pour le JavaScript)
        //         $this->addThemeActiviteField($form, null);
        //         $this->addActiviteField($form, null);
        //       }
        //     }
        //   );
    }

        private function addActiviteField(FormInterface $form, ?ThemeActivite $themeActivite){
        $form->add('ville', EntityType::class, [
            'class'       => 'AppBundle\Entity\Ville',
            'placeholder' => $themeActivite ? 'Sélectionnez votre ville' : 'Sélectionnez votre département',
            'choices'     => $themeActivite ? $themeActivite->getActivites() : []
            ]);
        }

    

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

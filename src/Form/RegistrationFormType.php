<?php

namespace App\Form;

use App\Entity\GroupeActivite;
use App\Entity\ThemeActivite;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'attr'=>[
                    'placeholder'=>'Votre couriel électronique 1'
                ]
            ])
            ->add('lastname',TextType::class,array('attr'=>array('placeholder'=>'Le nom du représentant')))
            ->add('firstname', TextType::class,array('attr'=>array('placeholder'=>'Le prénom du représentant')))
            ->add('phone_number',TextType::class,array('attr'=>array('placeholder'=>'Le numéro de téléphone 1 du représentant')))
            ->add('phone_number2',TextType::class,array('attr'=>array('placeholder'=>'Le numéro de téléphone 2 du réprésentant')))
            ->add('mail_contact2',EmailType::class, [
                'attr'=>[
                    'placeholder'=>'Votre couriel électronique 2'
                ]
            ])
            ->add('social_objet',TextType::class,array('attr'=>array('placeholder'=>'L\'objet social de votre organisation')))
            ->add('description_activite',TextType::class,array('attr'=>array('placeholder'=>'La description précise de votre activité')))
            ->add('groupe_activite', EntityType::class,[
                'class'=>'App\Entity\GroupeActivite',
                'placeholder'=>'Sélectionner un groupe d\'activité',
                'mapped'=> false,
                'required'=>true    

            ])
            ->add('denomination', TextType::class,array('attr'=>array('placeholder'=>'Le nom de votre organisation')))
            ->add('statut_juridique',StatutJuridiqueFormType::class)
            ->add('ville',TextType::class,array('attr'=>array('placeholder'=>'La ville de votre siège')))
            ->add('province', ProvinceFormType::class)
            ->add('sigle',TextType::class,array('attr'=>array('placeholder'=>'Une abréviation de votre organisation')))
            ->add('numero_recepisse',TextType::class,array('attr'=>array('placeholder'=>'Le numéro de votre récépissé')))
            ->add('date_creation')
            ->add('adresse',TextType::class,array('attr'=>array('placeholder'=>'La ville de votre siège')))
            ->add('site_internet',TextType::class,array('attr'=>array('placeholder'=>'Le lien de votre site internet')))
            ->add('lien_facebook',TextType::class,array('attr'=>array('placeholder'=>'Le lien facebook de votre page')))
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
                'first_options'  => ['label' => 'Mot de passe (*)'],
                'second_options' => ['label' => 'Répéter Mot de passe (*)']
            ]);
 
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

<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatutJuridiqueFormType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'ASSOCIATION' => 'ASSOCIATION',
                'ONG' => 'ONG',                
                'COOPERATIVE (SCOOPS)'=>'COOPERATIVE (SCOOPS)',
                'COOPERATIVE (SCOOP-CA)'=>'COOPERATIVE (SCOOPS)',
                'FONDATION'=>'COOPERATIVE (SCOOPS)',	
                'FEDERATION'=>'COOPERATIVE (SCOOPS)',
                'AUTRE'     =>'AUTRE'
            ],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}



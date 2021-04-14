<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProvinceFormType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'ESTUAIRE (Libreville)'=>'ESTUAIRE (Libreville)',
                'HAUT-OGOOUE (Franceville)'=>'HAUT-OGOOUE (Franceville)',
                'MOYEN-OGOOUE ( Lambaréné )'=>'MOYEN-OGOOUE ( Lambaréné )',
                'NGOUNIE (Mouila)'=>'NGOUNIE (Mouila)',
                'NYANGA (Tchibanga)'=>'NYANGA (Tchibanga)',
                'OGOOUE-IVINDO (Makokou)'=>'OGOOUE-IVINDO (Makokou)',
                'OGOOUE-LOLO (Koulamoutou)'=>'OGOOUE-LOLO (Koulamoutou)',
                'OGOOUE-MARITIME (Port-Gentil)'=>'OGOOUE-MARITIME (Port-Gentil)',
                'WOLEU-NTEM (Oyem)'=>'WOLEU-NTEM (Oyem)'
            ],
        ]);
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }
}

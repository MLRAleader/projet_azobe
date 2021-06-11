<?php

namespace App\Controller\Admin;

use App\Entity\Organisation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OrganisationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Organisation::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('denomination'),
            TextField::new('sigle'),
            TextField::new('statutJuridique'),
            TextField::new('adresse'),
            NumberField::new('numeroRecepicee'),
            TextField::new('province'),
            TextField::new('ville'),
            TextField::new('objetSocial'),
            TextareaField::new('descriptionActivite'),
            TextField::new('siteInternet'),
            TextField::new('lienFacebook'),
            TelephoneField::new('numero_telephone1'),
            TelephoneField::new('numero_telephone2'),
            EmailField::new('emailOrganisation')

        ];
    }
}

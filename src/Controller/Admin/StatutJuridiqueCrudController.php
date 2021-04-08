<?php

namespace App\Controller\Admin;

use App\Entity\StatutJuridique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StatutJuridiqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return StatutJuridique::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}

<?php

namespace App\Controller\Admin;

use App\Entity\AppelCategory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AppelCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AppelCategory::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name')
        ];
    }
    
}

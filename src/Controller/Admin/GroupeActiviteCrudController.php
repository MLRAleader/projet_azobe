<?php

namespace App\Controller\Admin;

use App\Entity\GroupeActivite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GroupeActiviteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GroupeActivite::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
        ];
    }
    
}

<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Date;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title','Titre'),
            SlugField::new('slug')->setTargetFieldName('title')->hideOnIndex(),
            TextField::new('tags'),
            TextEditorField::new('description','Description'),
            ImageField::new('image')->setBasePath('/assets/uploads/articles')
                                    ->setUploadDir('public/assets/uploads/articles')
                                    ->setUploadedFileNamePattern('[randomhash].[extension]')
                                    ->setRequired(false)
        ];
    }
    
}

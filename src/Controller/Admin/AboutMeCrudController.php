<?php

namespace App\Controller\Admin;

use App\Entity\AboutMe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AboutMeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AboutMe::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('title'),
            TextField::new('email'),
            TextField::new('githubLink'),
            TextField::new('function'),
            TextField::new('avatar'),
            TextEditorField::new('description'),
        ];
    }
    

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            // this will forbid to create or delete entities in the backend
            ->disable(Action::NEW, Action::DELETE)
        ;
    }
}

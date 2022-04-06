<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('Firstname'),
            TextField::new('Lastname'),
            TextField::new('Email'),
            TextEditorField::new('Message'),
        ];
    }
    

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            // this will forbid to create or delete entities in the backend
            ->disable(Action::NEW, /*Action::EDIT*/)
        ;
    }
}

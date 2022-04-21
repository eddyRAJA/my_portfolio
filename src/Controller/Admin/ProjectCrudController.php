<?php

namespace App\Controller\Admin;

use App\Entity\Techno;
use App\Entity\Project;
use App\Entity\Illustration;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('title'),
            TextField::new('slug'),
            TextEditorField::new('pitch'),
            TextEditorField::new('description'),
            TextField::new('githubLink'),
            TextField::new('website'),
            AssociationField::new('technos'),
            //AssociationField::new('gallery'),
        ];
    }
}
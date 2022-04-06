<?php

namespace App\Controller\Admin;

use App\Entity\Timeline;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TimelineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Timeline::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            IntegerField::new('year'),
            TextEditorField::new('description'),
        ];
    }
    
}

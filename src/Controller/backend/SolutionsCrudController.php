<?php

namespace App\Controller\backend;

use App\Entity\Solutions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SolutionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Solutions::class;
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

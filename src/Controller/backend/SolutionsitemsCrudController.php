<?php

namespace App\Controller\backend;

use App\Entity\Solutionsitems;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SolutionsitemsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Solutionsitems::class;
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

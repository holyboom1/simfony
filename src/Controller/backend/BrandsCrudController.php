<?php

namespace App\Controller\backend;

use App\Entity\Brands;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BrandsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Brands::class;
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

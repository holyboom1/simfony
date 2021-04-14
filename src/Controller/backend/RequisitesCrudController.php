<?php

namespace App\Controller\backend;

use App\Entity\Requisites;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RequisitesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Requisites::class;
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

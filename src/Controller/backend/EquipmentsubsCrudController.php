<?php

namespace App\Controller\backend;

use App\Entity\Equipmentsubs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EquipmentsubsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Equipmentsubs::class;
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

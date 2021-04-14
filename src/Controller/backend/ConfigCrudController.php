<?php

namespace App\Controller\backend;

use App\Entity\Config;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ConfigCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Config::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('blockname')->onlyOnDetail(),
            TextField::new('lang'),
            TextField::new('admin_name'),
            EmailField::new('admin_email'),
            TextField::new('admin_phone'),
            TextEditorField::new('adress'),
            UrlField::new('maplink')->hideOnIndex(),

        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE)
            ;
    }

}

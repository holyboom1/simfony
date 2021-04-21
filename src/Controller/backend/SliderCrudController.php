<?php

namespace App\Controller\backend;

use App\Entity\Navigation;
use App\Entity\Slider;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\LanguageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Vich\UploaderBundle\Form\Type\VichImageType;


class SliderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Slider::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            LanguageField::new('lang', 'Язык'),
            TextEditorField::new('name', 'Название'),
            TextEditorField::new('text1', 'Текст блока 1'),
            TextEditorField::new('text2', 'Текст блока 2'),
            TextEditorField::new('text3', 'Текст блока 3'),
            ImageField::new('imgurl', 'Image')
                ->setRequired(false)
                ->setUploadDir('public/uploads/images')
                ->setTemplatePath('backend/image.html.twig'),


        ];
    }

    public function configureActions(Actions $actions): Actions
    {

        return $actions
            // ...
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE)
            ;
    }
}

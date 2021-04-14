<?php

namespace App\Controller\backend;

use App\Entity\Aboutcompany;
use App\Entity\Navigation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\LanguageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class AboutcompanyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Aboutcompany::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('position'),
            LanguageField::new('lang', 'Язык'),
            TextEditorField::new('text', 'Текст'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        $PositionDown = Action::new('PositionDown', '', 'fa fa-arrow-down')
            ->linkToCrudAction('PositionDown');
        $PositionUp = Action::new('PositionUp', '', 'fa fa-arrow-up')
            ->linkToCrudAction('PositionUp');

        return $actions
            // ...
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_INDEX, $PositionDown)
            ->add(Crud::PAGE_INDEX, $PositionUp)
//            ->remove(Crud::PAGE_INDEX, Action::DELETE)
//            ->remove(Crud::PAGE_INDEX, Action::EDIT)
//            ->remove(Crud::PAGE_INDEX, Action::NEW)
//            ->remove(Crud::PAGE_DETAIL, Action::DELETE)
//            ->remove(Crud::PAGE_DETAIL, Action::EDIT)
            ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)->setDefaultSort(['position' => 'ASC']); // TODO: Change the autogenerated stub
    }

    public function PositionUp (AdminContext $context) {
        $id     = $context->getRequest()->query->get('entityId');
        $entityThis = $this->getDoctrine()->getRepository(Navigation::class)->findOneBy(['id'=>$id]);
        $positionNow = $entityThis->getPosition();
        if ($positionNow>1){
            $entityOther= $this->getDoctrine()->getRepository(Navigation::class)->findOneBy(['position'=>$positionNow-1]);
            $entityThis->setPosition($positionNow-1);
            $entityOther->setPosition($positionNow);
            $em = $this->getDoctrine()->getManager();
            $em->persist($entityThis);
            $em->flush();
            $em->persist($entityOther);
            $em->flush();
        }
        $url = $this->get(AdminUrlGenerator::class)
            ->setAction(Action::INDEX)
            ->setEntityId($context->getEntity()->getPrimaryKeyValue())
            ->generateUrl();

        return $this->redirect($url);

    }

    public function PositionDown (AdminContext $context) {
        $id = $context->getRequest()->query->get('entityId');
        $entityThis = $this->getDoctrine()->getRepository(Navigation::class)->findOneBy(['id'=>$id]);
        $positionNow = $entityThis->getPosition();
        $entityOther= $this->getDoctrine()->getRepository(Navigation::class)->findOneBy(['position'=>$positionNow+1]);
        $entityThis->setPosition($positionNow+1);
        $entityOther->setPosition($positionNow);
        $em = $this->getDoctrine()->getManager();
        $em->persist($entityThis);
        $em->flush();
        $em->persist($entityOther);
        $em->flush();

        $url = $this->get(AdminUrlGenerator::class)
            ->setAction(Action::INDEX)
            ->setEntityId($context->getEntity()->getPrimaryKeyValue())
            ->generateUrl();

        return $this->redirect($url);

    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\Meeting;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MeetingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Meeting::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add('index','detail');
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Subject'),
            DateTimeField::new('Date'),
            TextEditorField::new('Report'),
            AssociationField::new('Participants'),
        ];
    }

}

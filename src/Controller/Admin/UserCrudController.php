<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add('index','detail');
    }

    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('FullName'),
            TextField::new('email'),
            TelephoneField::new('Tel'),
            TextField::new('Address'),
            AssociationField::new('Departement'),
            AssociationField::new('Grade'),
            TextField::new('password'),
        ];
    }

}

<?php

namespace App\Controller\Admin;

use App\Entity\Furlough;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FurloughCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Furlough::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Cause'),
            DateField::new('Begin'),
            DateField::new('End'),
            AssociationField::new('employer'),
            BooleanField::new('State'),
        ];
    }

}

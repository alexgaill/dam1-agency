<?php

namespace App\Controller\Admin;

use App\Entity\Bien;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BienCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bien::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Bien')
            ->setEntityLabelInPlural('Nos biens')
            ->renderContentMaximized()
            ->setPaginatorPageSize(10)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextEditorField::new('description')->hideOnIndex(),
            ChoiceField::new('transactionType')->setChoices([
                    "Location" => 0,
                    "Achat" => 1
                ])->renderExpanded(true),
            IntegerField::new('surface'),
            IntegerField::new('surfaceTerrain'),
            IntegerField::new('nbPieces'),
            IntegerField::new('etage'),
            TextField::new('adresse')->hideOnIndex(),
            TextField::new('codePostal')->hideOnIndex(),
            TextField::new('ville')->hideOnIndex(),
            DateField::new('dateConstruction')->hideOnIndex(),
            ChoiceField::new('typeBien')->setChoices([
                "Appartement" => 0,
                "Maison" => 1,
                "Villa" => 2
            ])->renderExpanded(),
            // ImageField::new('image')->setUploadDir($this->getParameter('upload_dir'))

        ];
    }
}

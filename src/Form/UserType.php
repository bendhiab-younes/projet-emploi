<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Classe;
use App\Entity\Matiere;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class UserType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true, // Make the email field optional for editing
            ])
            ->add('nom',TextType::class, [
                'disabled' => true,
                ])
            ->add('prenom',TextType::class, [
                'disabled' => true,
                ])
            ->add('CIN',NumberType::class, [
                'disabled' => true,
                ])
                ->add('type', ChoiceType::class, [
                    'choices' => [
                        'Etudiant' => 'etudiant',
                        'Enseignant' => 'enseignant',
                        'Admin' => 'admin',
                    ],
                    'disabled' => true,
                ])
                ->add('classe', EntityType::class, [
                    'class' => Classe::class,
                    'choices' => $this->getClassChoices(),
                ])
                ->add('matieres', EntityType::class, [
                    'class' => Matiere::class, 
                    'multiple' => true, 
                    'expanded' => true,
                    'by_reference' => false,
                ])
                ->add('departement',ChoiceType::class, [
                    'choices' => [
                        'Informatique' => 'Informatique',
                        'Mecanique' => 'Mecanique',
                        'Electrique' => 'Electrique',
                        'Managment' => 'Managment',
                    ],
                ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
    
    private function getClassChoices(): array
    {
        $classes = $this->entityManager->getRepository(Classe::class)->findAll();
        $choices = [];

        foreach ($classes as $classe) {
            $choices[$classe->getNomClasse()] = $classe;
        }

        return $choices;
    }
}

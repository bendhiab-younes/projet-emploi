<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Classe;
use App\Entity\Matiere;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('CIN', NumberType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d{8,}$/',
                        'message' => 'CIN should be at least 8 digits',
                    ]),
                ],
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Etudiant' => 'etudiant',
                    'Enseignant' => 'enseignant',
                    'Admin' => 'admin',
                ],
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
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
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

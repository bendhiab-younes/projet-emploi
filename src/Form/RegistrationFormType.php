<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Matiere;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

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
            ->add('CIN')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Etudiant' => 'etudiant',
                    'Enseignant' => 'enseignant',
                    'Admin' => 'admin',
                ],
            ])
            ->add('classe', ChoiceType::class, [
                'choices' => $this->getClassChoices(),
                'choice_value' => 'id',
                'choice_label' => 'nomClasse',
            ])
            ->add('matieres', EntityType::class, [
                'class' => Matiere::class,
                'choice_label' => 'nomMatiere',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('departement')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
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

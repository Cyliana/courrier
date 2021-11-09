<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class FormInscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label'=>'Identifiant',
                'attr'=>['placeholder'=>'Saississez votre identifiant',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            
            // ->add('roles', ChoiceType::class, [
            //     'choices' => User::ROLES,
            //     'expanded' => true,
            //     'multiple' => true,
            //     'label' => false
            // ])
            
            ->add('password', PasswordType::class, [
                'attr' => ['autocomplete' => 'new-password'],
                'label' => 'Mot de passe',
                'attr' => ['placeholder' => 'Mot de passe...', 
                    'class' => 'form-control'],
                'label_attr' => ['class' => 'form-label'],
            ])

            ->add('nom', TextType::class, [
                'label'=>'Nom',
                'attr'=>['placeholder'=>'Votre nom',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            ->add('prenom', TextType::class, [
                'label'=>'Prénom',
                'attr'=>['placeholder'=>'Votre prénom',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            ->add('adresse', TextType::class, [
                'label'=>'Votre adresse',
                'attr'=>['placeholder'=>'N° de voie,rue, impasse, etc.',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            ->add('codePostal', TextType::class, [
                'label'=>'Code postal',
                'attr'=>['placeholder'=>'Votre code postal',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            ->add('localite', TextType::class, [
                'label'=>'Ville',
                'attr'=>['placeholder'=>'votre ville',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            ->add('mail', EmailType::class, [
                'label'=>'Email',
                'attr'=>['placeholder'=>'votre adresse e-mail',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            ->add('telephone', TextType::class, [
                'label'=>'N° de téléphone',
                'attr'=>['placeholder'=>'votre n° de téléphone',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            ->add('titre', TextType::class, [
                'label'=>'Titre',
                'attr'=>['placeholder'=>'votre titre (Maître, Dr etc.',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

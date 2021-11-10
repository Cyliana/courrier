<?php

namespace App\Form;

use App\Entity\Destinataire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DestinataireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
            ->add('fonction',TextType::class, [
                'label'=>'Fonction',
                'attr'=>['placeholder'=>'Fonction au sein de l\'entreprise',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])

            ->add('denomination',TextType::class, [
                'label'=>'Dénomination',
                'attr'=>['placeholder'=>'Nom de l\'entreprise',
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
            ->add('telephone', TextType::class, [
                'label'=>'N° de téléphone',
                'attr'=>['placeholder'=>'votre n° de téléphone',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            ->add('mail', EmailType::class, [
                'label'=>'Email',
                'attr'=>['placeholder'=>'votre adresse e-mail',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            ->add('commentaire', TextareaType::class,[
                'label'=>'Commentaire',
                'attr'=>['placeholder'=>'Ecrivez un commentaire',
                    'class'=>'form-control'],
                'label_attr'=>['class'=>'form-label'],
            ])
            ->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Destinataire::class,
        ]);
    }
}

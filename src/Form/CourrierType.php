<?php

namespace App\Form;

use App\Entity\Courrier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourrierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('refAnnonce')
            ->add('objet')
            ->add('dateCreation')
            ->add('dateModification')
            ->add('dateEnvoi')
            ->add('dateRelance')
            ->add('nosRef')
            ->add('vosRef')
            ->add('paragrapheJe')
            ->add('paragrapheVous')
            ->add('paragrapheNous')
            ->add('paragraphePolitesse')
            ->add('statut')
            ->add('copieAnnonce')
            ->add('destinataire')
            ->add('utilisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Courrier::class,
        ]);
    }
}

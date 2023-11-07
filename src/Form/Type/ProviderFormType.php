<?php

namespace App\Form\Type;

use App\Entity\Provider;
use App\Entity\ProviderType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProviderFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('contact_phone')
            ->add('active', ChoiceType::class, [
                'choices'  => [
                    'Si' => 1,
                    'No' => 0,
                ]])
            ->add('provider_type_id', ChoiceType::class, [
                'choices'  => [
                    'Hotel' => 1,
                    'Pista' => 2, 
                    'Complemento' => 3, 
                ]])
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Provider::class,
        ]);
    }
}

<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email', EmailType::class)
            ->add('cellPhone')
            ->add('country', CountryType::class, ['empty_data' => null, 'placeholder' => 'Select Your country',])
            ->add('dob', BirthdayType::class)
            ->add('dietary')
            ->add('transportation', ChoiceType::class, [
                'empty_data' => null,
                'placeholder' => 'Select your transport',
                'choices' => [
                    'Bus' => 'Bus',
                    'Own car' => 'Own car'
                ],
            ])
            ->add('remarks')
            ->add('knownFrom', ChoiceType::class, [
                'choices' => [
                    'x' => 'xx',
                    'y' => 'yy',
                ]
            ])
            ->add('save', SubmitType::class, array('label' => 'Apply for event.'))

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Registration'
        ));
    }
}

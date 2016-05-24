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
            ->add('firstName', null, ['label' => 'First name'])
            ->add('lastName', null, ['label' => 'Last name'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('cellPhone')
            ->add('country', CountryType::class, [
                'empty_data' => null,
                'placeholder' => 'Select Your country',
                'label' => 'Country of living'
            ])
            ->add('dob', BirthdayType::class, ['label' => 'Date of Birth'])
            ->add('dietary', null, ['label' => 'Dietary requirements (kosher style food will be served. Please specify for any other dietary requirements)'])
            ->add('transportation', ChoiceType::class, [
                'empty_data' => null,
                'placeholder' => 'Select your transport',
                'choices' => [
                    'Organised bus' => 'Organised bus',
                    'Own car' => 'Own car'
                ],
            ])
            ->add('remarks', null, ['label' => 'Remarks & Comments about accommodation'])
            ->add('knownFrom', ChoiceType::class, [
                'label' => 'How did you hear about OR HAPPENING',
                'choices' => [
                    'Community' => 'Community',
                    'Friends' => 'Friends',
                    'Facebook' => 'Facebook',
                    'Family' => 'Family',
                    'Synagogue' => 'Synagogue',
                    'Other' => 'Other',
                ]
            ])
            ->add('save', SubmitType::class, array('label' => 'Agree with terms & Apply for event'))

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

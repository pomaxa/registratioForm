<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationAdmin extends AbstractAdmin
{
    public function __construct($code, $class, $baseControllerName)
    {

        parent::__construct($code, $class, $baseControllerName);
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('cellPhone')
            ->add('country')
            ->add('dob')
            ->add('dietary')
            ->add('transportation')
            ->add('remarks')
            ->add('knownFrom')
            ->add('isApproved')
            ->add('status', ChoiceType::class, ['choices' => [
                'APPROVED',
                'NEW',
                'DENIED'
            ]])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper

        ->add('firstName')
        ->add('lastName')
        ->add('email')
        ->add('cellPhone')
        ->add('country')
        ->add('dob')
        ->add('dietary')
        ->add('transportation')
        ->add('remarks')
        ->add('knownFrom')
        ->add('isApproved')
        ->add('status');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('cellPhone')
            ->add('country')
            ->add('dob')
            ->add('dietary')
            ->add('transportation')
            ->add('remarks')
            ->add('knownFrom')
            ->add('isApproved')
            ->add('status');
    }
}

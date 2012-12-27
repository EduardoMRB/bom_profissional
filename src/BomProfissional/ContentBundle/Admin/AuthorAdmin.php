<?php

namespace BomProfissional\ContentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class AuthorAdmin extends Admin
{
    protected $maxPerPage = 5;

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('birthdate', null, array('label' => 'Data de nascimento'))
            ->add('isActive', null, array('required' => false, 'label' => 'Ativo'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('birthdate')
            ->add('isActive')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('isActive')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('name')
                ->assertMaxLength(array('limit' => 32))
                ->assertMinLength(array('limit' => 5))
                ->assertNotBlank()
                ->assertNotNull(array())
            ->end()
        ;
    }
}
<?php

namespace BomProfissional\ContentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class CourseAdmin extends Admin
{
    protected $maxPerPage = 5;

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', null, array('label' => 'Título'))
            ->add('description', null, array('label' => 'Descrição'))
            ->add('isActive', null, array('required' => false, 'label' => 'Ativo'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('isActive')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('isActive')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('title')
                ->assertMaxLength(array('limit' => 32))
                ->assertMinLength(array('limit' => 5))
                ->assertNotBlank()
                ->assertNotNull(array())
            ->end()
            ->with('description')
                ->assertNotBlank()
            ->end()
        ;
    }
}
<?php

namespace BomProfissional\ContentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class StudentAdmin extends Admin
{
    protected $maxPerPage = 5;

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label' => 'Nome'))
            ->add('lastName', null, array('label' => 'Sobrenome'))
            ->add('username', null, array('label' => 'Username'))
            ->add('passwd', null, array('label' => 'Senha'))
            ->add('email', null, array('label' => 'Email'))
            ->add('city', null, array('label' => 'Cidade'))
            ->add('country', null, array('label' => 'País'))
            ->add('cpf', null, array('label' => 'CPF'))
            ->add('phone', null, array('label' => 'Telefone'))
            ->add('course', 'choice', array('label' => 'Curso'))
            ->add('paymentDue', null, array('label' => 'Melhor data de pagamento'))
            ->add('street', null, array('label' => 'Rua'))
            ->add('cep', null, array('label' => 'CEP'))
            ->add('district', null, array('label' => 'Bairro'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('lastName')
            ->add('cpf')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('email')
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
<?php

namespace App\FinanceBundle\Form\Product;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
                ->add('name')
                ->add('count')
                ->add('price');
    }
    
    public function getDefaultOptions(array $options){
        return array(
            'data_class' => 'App\FinanceBundle\Entity\Product',
        );
    }
    
}


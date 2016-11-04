<?php

namespace gestorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;



class empresaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre',TextType::class,array('label'=>'Nombre de la empresa',
                                                  'label_attr'=>array('class'=>'tag'),
                                                  'attr'=> array('class' => 'tag2')))
            ->add('direccion',TextType::class,array('label'=>'Dirección',
                                                  'label_attr'=>array('class'=>'tag'),
                                                  'attr'=> array('class' => 'tag2')))
            ->add('cp',IntegerType::class,array('label'=>'Código Postal',
                                                  'label_attr'=>array('class'=>'tag'),
                                                  'attr'=> array('class' => 'tag2')))
            ->add('telefono1',IntegerType::class,array('label'=>'Teléfono1',
                                                  'label_attr'=>array('class'=>'tag'),
                                                  'attr'=> array('class' => 'tag2')))
            ->add('telefono2',IntegerType::class,array('label'=>'Teléfono2',
                                                  'label_attr'=>array('class'=>'tag'),
                                                  'attr'=> array('class' => 'tag2')))
            ->add('fechaCreacion',TextType::class,array('label'=>'Fecha de creación',
                                                  'label_attr'=>array('class'=>'tag'),
                                                  'attr'=> array('class' => 'tag2')))
            ->add('guardar',SubmitType::class)
            ->add('borrar',ResetType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'gestorBundle\Entity\empresa'
        ));
    }
}

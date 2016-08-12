<?php

namespace Cz\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChambreGeneraleType extends AbstractType
{    /**
 * @param FormBuilderInterface $builder
 * @param array $options
 */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('translations', 'a2lix_translations');


    }


    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cz\AdminBundle\Entity\ChambreGenerale'
        ));
    }
}

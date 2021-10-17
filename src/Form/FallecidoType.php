<?php

namespace App\Form;

use App\Entity\Datosfallecido;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FallecidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fechanacimientofallecido')
            ->add('fechadefuncion')
            ->add('idadministradoraseguridad')
            ->add('idprobablemaneramuerte')
            ->add('idregimenseguridad')
            ->add('idsexo')
            ->add('idsitiodefuncion')
            ->add('idtipodefuncion')
            ->add('idtipodocumento')
            ->add('idmunicipio')
            ->add('idcausadirecta')
            ->add('idestadocivil')
            ->add('idgrupoindigena')
            ->add('idinstitucion')
            ->add('idniveleducativo')
            ->add('idnombrearea')
            ->add('idocupacion')
            ->add('idpertenenciaetnica')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Datosfallecido::class,
        ]);
    }
}

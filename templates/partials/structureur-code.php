<?php

$builder->add('Status', 'choice', array( 'choices' => array('' => '',  'PASS' => 'PASS', 'FAIL' => 'FAIL', 'INCOMPLETE' => 'INCOMPLETE', 'DROPPED' => 'DROPPED',),
             'required' => FALSE,
             'attr' => array( 'class' => 'text-uppercase' ), 

));

?>
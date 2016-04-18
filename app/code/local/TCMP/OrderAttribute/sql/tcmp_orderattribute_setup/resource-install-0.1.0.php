<?php
/**
 * Created by Brandastic.
 * User: Austin
 * Date: 4/15/2016
 * Time: 7:53 AM
 * TEAS-162
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$attribute  = array(
    'type'          => 'int', //todo set length
    'backend_type'  => 'int',
    'frontend_input' => 'int',
    'is_user_defined' => true,
    'label'         => 'Customer Account',
    'input'         => 'select',
    'option'        => array(
            'value' => array(
                    '1' => array('Yes'),
                    '2' => array('No'),
                )
        ),
    'visible'       => true,
    'required'      => false,
    'user_defined'  => true,
    'searchable'    => true,
    'filterable'    => true,
    'comparable'    => true,
    'default'       => ''
);

$attribute2  = array(
    'type'          => 'int', //todo set length
    'backend_type'  => 'int',
    'frontend_input' => 'int',
    'is_user_defined' => true,
    'label'         => 'Teas Etc Marketing',
    'input'         => 'select',
    'option'        => array(
            'value' => array(
                    '1' => array('Yes'),
                    '2' => array('No'),
                )
        ),
    'visible'       => true,
    'required'      => false,
    'user_defined'  => true,
    'searchable'    => true,
    'filterable'    => true,
    'comparable'    => true,
    'default'       => ''
);
$attribute3  = array(
    'type'          => 'int', //todo set length
    'backend_type'  => 'int',
    'frontend_input' => 'int',
    'is_user_defined' => true,
    'label'         => 'Freight',
    'input'         => 'select',
    'option'        => array(
            'value' => array(
                    '1' => array('Yes'),
                    '2' => array('No'),
                )
        ),
    'visible'       => true,
    'required'      => false,
    'user_defined'  => true,
    'searchable'    => true,
    'filterable'    => true,
    'comparable'    => true,
    'default'       => ''
);

$attribute4  = array(
    'type'          => 'int', //todo set length
    'backend_type'  => 'int',
    'frontend_input' => '',
    'is_user_defined' => true,
    'label'         => 'USPS First Class Mail',
    'input'         => 'select',
    'option'        => array(
            'value' => array(
                    '1' => array('Yes'),
                    '2' => array('No'),
                )
        ),
    'visible'       => true,
    'required'      => false,
    'user_defined'  => true,
    'searchable'    => true,
    'filterable'    => true,
    'comparable'    => true,
    'default'       => ''
);

$installer->addAttribute("order", "co_account", $attribute);
$installer->addAttribute("quote", "co_account", $attribute);

$installer->addAttribute("order", "teas_marketing", $attribute2);
$installer->addAttribute("quote", "teas_marketing", $attribute2);

$installer->addAttribute("order", "freight", $attribute3);
$installer->addAttribute("quote", "freight", $attribute3);

$installer->addAttribute("order", "usps_first_class_mail", $attribute4);
$installer->addAttribute("quote", "usps_first_class_mail", $attribute4);

$installer->endSetup();
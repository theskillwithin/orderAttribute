<?php
/**
 * Created by Brandastic.
 * User: Austin
 * Date: 4/15/2016
 * Time: 8:18 AM
 * TEAS-162
 */
class TCMP_OrderAttribute_Block_Adminhtml_Sales_Order_Create_Form_Account extends Mage_Adminhtml_Block_Sales_Order_Create_Form_Account
{
    protected function _prepareForm()
    {
        /* @var $customerModel Mage_Customer_Model_Customer */
        $customerModel = Mage::getModel('customer/customer');

        /* @var $customerForm Mage_Customer_Model_Form */
        $customerForm   = Mage::getModel('customer/form');
        $customerForm->setFormCode('adminhtml_checkout')
            ->setStore($this->getStore())
            ->setEntity($customerModel);

        // prepare customer attributes to show
        $attributes     = array();

        // add system required attributes
        foreach ($customerForm->getSystemAttributes() as $attribute) {
            /* @var $attribute Mage_Customer_Model_Attribute */
            if ($attribute->getIsRequired()) {
                $attributes[$attribute->getAttributeCode()] = $attribute;
            }
        }

        if ($this->getQuote()->getCustomerIsGuest()) {
            unset($attributes['group_id']);
        }

        // add user defined attributes
        foreach ($customerForm->getUserAttributes() as $attribute) {
            /* @var $attribute Mage_Customer_Model_Attribute */
            $attributes[$attribute->getAttributeCode()] = $attribute;
        }

        $fieldset = $this->_form->addFieldset('main', array());


        $this->_addAttributesToForm($attributes, $fieldset);

        $this->_form->addFieldNameSuffix('order[account]');

        /* setting fields for TEAS-162 */
        $fieldset->addField('co_account', 'int',
            array(
                'label' => 'Customer Account',
                'name' => 'order[co_account]'
            ));

        $fieldset->addField('teas_marketing', 'int',
            array(
                'label' => 'Teas Etc Marketing',
                'name' => 'order[teas_marketing]'
            ));
        $fieldset->addField('freight', 'int',
            array(
                'label' => 'Freight',
                'name' => 'order[freight]'
            ));
        $fieldset->addField('usps_first_class_mail', 'int',
            array(
                'label' => 'USPS First Class Mail',
                'name' => 'order[usps_first_class_mail]'
            ));
        /* END setting fields for TEAS-162 */

        $this->_form->setValues($this->getFormValues());

        return $this;
    }
}
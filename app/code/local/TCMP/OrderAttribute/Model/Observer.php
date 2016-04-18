<?php
/**
 * Created by Brandastic.
 * User: Austin
 * Date: 4/15/2016
 * Time: 8:02 AM
 * TEAS-162
 */
class TCMP_OrderAttribute_Model_Observer extends Varien_Event_Observer
{
    public function saveNewShip($event)
    {
        $orderPost = Mage::app()->getRequest()->getPost('order');
        if($orderPost['co_account']){
            $quote = $event->getSession()->getQuote();
            $quote->setData('co_account', $orderPost['co_account']);
            //$quote->save();

        }

        if($orderPost['teas_marketing']){
            $quote = $event->getSession()->getQuote();
            $quote->setData('teas_marketing', $orderPost['teas_marketing']);
            //$quote->save();

        }

        if($orderPost['freight']){
            $quote = $event->getSession()->getQuote();
            $quote->setData('freight', $orderPost['freight']);
            //$quote->save();
        }

        if($orderPost['usps_first_class_mail']){
            $quote = $event->getSession()->getQuote();
            $quote->setData('usps_first_class_mail', $orderPost['usps_first_class_mail']);
            //$quote->save();
        }

        return $this;
    }
}
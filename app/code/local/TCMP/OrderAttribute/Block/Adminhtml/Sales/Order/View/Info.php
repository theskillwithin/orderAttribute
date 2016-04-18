<?php
/**
 * Created by Brandastic.
 * User: Austin
 * Date: 4/15/2016
 * Time: 8:13 AM
 * TEAS-162
 */
class TCMP_OrderAttribute_Block_Adminhtml_Sales_Order_View_Info extends Mage_Adminhtml_Block_Sales_Order_View_Info{

    protected function _beforeToHtml()
    {
        if (!$this->getParentBlock()) {
            Mage::throwException(Mage::helper('adminhtml')->__('Invalid parent block for this block.'));
        }
        $this->setOrder($this->getParentBlock()->getOrder());

        foreach ($this->getParentBlock()->getOrderInfoData() as $k => $v) {
            $this->setDataUsingMethod($k, $v);
        }

        /* setting template for TEAS-162 */
        $this->setTemplate('TCMP/sales/order/view/info.phtml');
        /* end setting template for TEAS-162 */
        parent::_beforeToHtml();
    }
}
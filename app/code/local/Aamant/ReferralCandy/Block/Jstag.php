<?php
/**
 * JsTag
 *
 * @copyright Copyright © 2019 Arnaud Amant. All rights reserved.
 * @author Arnaud Amant <contact@arnaudamant.fr>
 */

class Aamant_ReferralCandy_Block_JsTag extends Mage_Core_Block_Template
{
    /**
     * @var Aamant_ReferralCandy_Helper_Data $helper
     */
    private $helper;

    public function __construct(array $args = array())
    {
        parent::__construct($args);
        $this->helper = $this->helper('referralcandy');
    }

    public function getConfig($path)
    {
        $storeId = Mage::app()->getStore()->getStoreId();
        return $this->helper->getConfig($path, $storeId);
    }

    public function isEnable()
    {
        return $this->getConfig('enable');
    }

    public function getOrder()
    {
        $orderId = Mage::getSingleton('checkout/session')->getLastOrderId();
        if ($orderId) {
            $order = Mage::getModel('sales/order')->load($orderId);
            if ($order->getId()) {
                return $order;
            }
        }

        return false;
    }

    /**
     * MD5(EMAIL,FIRST_NAME, INVOICE_AMOUNT,TIMESTAMP,ACCOUNT_SECRET)
     *
     * @param Mage_Sales_Model_Order $order
     * @return string
     */
    public function getSignature(Mage_Sales_Model_Order $order)
    {
        return md5(implode(',', [
            $order->getCustomerEmail(),
            $order->getCustomerFirstname(),
            $order->getTotalPaid(),
            Mage::getModel('core/date')->timestamp($order->getCreatedAt()),
            $this->getConfig('secret')
        ]));
    }
}
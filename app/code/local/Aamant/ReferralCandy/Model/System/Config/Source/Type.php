<?php
/**
 * Type
 *
 * @copyright Copyright © 2019 Arnaud Amant. All rights reserved.
 * @author Arnaud Amant <contact@arnaudamant.fr>
 */

class Aamant_ReferralCandy_Model_System_Config_Source_Type
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'refcandy-mint', 'label'=>Mage::helper('adminhtml')->__('Simple')),
            array('value' => 'refcandy-popsicle', 'label'=>Mage::helper('adminhtml')->__('Popup')),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            0 => Mage::helper('adminhtml')->__('No'),
            1 => Mage::helper('adminhtml')->__('Yes'),
        );
    }
}
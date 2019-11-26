<?php
/**
 * Data
 *
 * @copyright Copyright © 2019 Arnaud Amant. All rights reserved.
 * @author Arnaud Amant <contact@arnaudamant.fr>
 */

class Aamant_ReferralCandy_Helper_Data extends Mage_Core_Helper_Abstract
{
    const BASE_PATH = "referralcandy/general/";

    public function getConfig($path, $store = null)
    {
        return Mage::getStoreConfig(self::BASE_PATH.$path, $store);
    }
}
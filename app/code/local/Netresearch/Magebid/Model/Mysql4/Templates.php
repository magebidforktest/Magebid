<?php
/**
 * Netresearch_Magebid_Model_Mysql4_Templates
 *
 * @category  Netresearch
 * @package   Netresearch_Magebid
 * @author    André Herrn <andre.herrn@netresearch.de>
 * @copyright 2010 André Herrn
 * @link      http://www.magebid.de/
*/
class Netresearch_Magebid_Model_Mysql4_Templates extends Mage_Core_Model_Mysql4_Abstract
{
    /**
     * Construct
     *
     * @return void
     */	
    protected function _construct()
    {
        $this->_init('magebid/templates', 'magebid_templates_id');
    }
}
?>

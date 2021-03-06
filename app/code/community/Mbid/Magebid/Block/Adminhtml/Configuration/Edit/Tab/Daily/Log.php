<?php
/**
 * Mbid_Magebid_Block_Adminhtml_Configuration_Edit_Tab_Daily_log
 *
 * @category  Mbid
 * @package   Mbid_Magebid
 * @author    André Herrn <info@magebid.com>
 * @copyright 2010 André Herrn | Netresearch GmbH & Co.KG (http://www.netresearch.de)
 * @link      http://www.magebid.com/
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
class Mbid_Magebid_Block_Adminhtml_Configuration_Edit_Tab_Daily_log extends Mage_Adminhtml_Block_Widget_Form
{	
    /**
     * Construct
     *
     * @return void
     */	
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('magebid/configuration/tab/daily/log.phtml');
        $this->setTitle('Return Policy');
    }
	
    /**
     * Return Header Text
     *
     * @return string
     */		
    public function getHeaderText()
    {
        return Mage::helper('magebid')
          ->__("Daily Log");
    }	
    
    /**
     * Before HTML
     *
     * @return object
     */	
    public function _beforeToHtml()
    {		
		$this->setChild('grid', $this->getLayout()->createBlock('magebid/adminhtml_configuration_edit_tab_daily_log_grid', 'configuration.daily.log.grid'));
        return parent::_beforeToHtml();
    }	    
    
    /**
     * Return URL to the Magebid Log - Grid View
     *
     * @return string
     */	
	public function getDetailedLogUrl()
	{
		return $this->getUrl('*/adminhtml_log_main/index');
	}
}
?>

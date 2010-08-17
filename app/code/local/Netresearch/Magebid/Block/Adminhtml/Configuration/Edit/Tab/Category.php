<?php
/**
 * Netresearch_Magebid_Block_Adminhtml_Configuration_Edit_Tab_Category
 *
 * @category  Netresearch
 * @package   Netresearch_Magebid
 * @author    André Herrn <andre.herrn@netresearch.de>
 * @copyright 2010 André Herrn
 * @link      http://www.magebid.de/
*/
class Netresearch_Magebid_Block_Adminhtml_Configuration_Edit_Tab_Category extends Mage_Adminhtml_Block_Widget
{
    /**
     * Construct
     *
     * @return void
     */		
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('magebid/configuration/tab/template.phtml');
        $this->setTitle('Categories');
    }
	
    /**
     * Return Header Text
     *
     * @return string
     */		
    public function getHeaderText()
    {
        return Mage::helper('magebid')
          ->__("Categories");
    }	
	
    /**
     * Return Form Data
     *
     * @return array
     */	
    public function getCatalogData()
    {
        return array(
            'import_categories'   => array(
                'label'     => Mage::helper('adminhtml')->__('Import Categories'),
                'buttons'   => array(
                    array(
                        'name'      => 'import_categories',
                        'action'    => Mage::helper('adminhtml')->__('Import'),
                        )
                ),
            ),
        );
    }
	
    /**
     * Before HTML
     *
     * @return object
     */		
    public function _beforeToHtml()
    {		
		$this->setChild('grid', $this->getLayout()->createBlock('magebid/adminhtml_configuration_edit_tab_category_grid', 'configuration.category.grid'));
        return parent::_beforeToHtml();
    }			
}
?>

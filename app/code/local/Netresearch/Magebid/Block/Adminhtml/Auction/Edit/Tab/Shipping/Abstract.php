<?php
/**
 * Netresearch_Magebid_Block_Adminhtml_Auction_Edit_Tab_Shipping_Abstract
 *
 * @category  Netresearch
 * @package   Netresearch_Magebid
 * @author    André Herrn <andre.herrn@netresearch.de>
 * @copyright 2010 André Herrn
 * @link      http://www.magebid.de/
*/
class Netresearch_Magebid_Block_Adminhtml_Auction_Edit_Tab_Shipping_Abstract extends Mage_Adminhtml_Block_Widget implements Varien_Data_Form_Element_Renderer_Interface
{
    protected $_element = null;
    protected $_shippingMethods = null;
    protected $_websites = null;

    /**
     * Construct
     *
     * @return void
     */	
    public function __construct()
    {
        $this->setTemplate('magebid/tab/shipping/method.phtml');
    }	
	
    /**
     * Return Product
     *
     * @return object
     */	
    public function getProduct()
    {
        return Mage::registry('product');
    }

    /**
     * Return rendered HTML
     *
     * @return string
     */	
    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $this->setElement($element);
        return $this->toHtml();
    }
	
    /**
     * Set Element
     * 
     * @param object $element Varien_Data_Form_Element_Abstract
     * 
     * @return object
     */	
    public function setElement(Varien_Data_Form_Element_Abstract $element)
    {
        $this->_element = $element;
        return $this;
    }

    /**
     * Get Element
     * 
     * @return object
     */	
    public function getElement()
    {
        return $this->_element;
    }
	
    /**
     * Get imported shipping methods from ebay
     * 
     * @return array|null
     */	
	public function getShippingMethods($shippingCode=null)
	{
        if (!$this->_shippingMethods) {
            $collection = Mage::getModel('magebid/import_shipping')
            	->getCollection()
            	->setOrder('description', 'asc')  
                ->load();

            foreach ($collection->getIterator() as $item) {
                $this->_shippingMethods[$item->getShippingService()] = $item->getDescription();
            }
        }
        return is_null($shippingCode) ? $this->_shippingMethods :
            (isset($this->_shippingMethods[$shippingCode]) ? $this->_shippingMethods[$shippingCode] : null);		
	}
	
    /**
     * Prepare Layout
     *
     * @return object
     */	
    protected function _prepareLayout()
    {
        $this->setChild('add_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('magebid')->__('Add Shipping Method'),
                    'onclick'   => 'shippingMethodControl.addItem()',
                    'class' => 'add'
                )));
        return parent::_prepareLayout();
    }

    /**
     * Return Add-Button-Html
     * 
     * @return string
     */	
    public function getAddButtonHtml()
    {
        return $this->getChildHtml('add_button');
    }	
	
    /**
     * Get existing values
     * 
     * @return array
     */	
    public function getValues()
    {
        $values =array();
        
        if (Mage::registry('frozen_magebid'))
        {
            $data = Mage::registry('frozen_magebid')->getData();
			if (isset($data['shipping_methods']) && count($data['shipping_methods']>0))
			{
				foreach ($data['shipping_methods'] as $value)
				{
					$values[] = $value;
				}					
			}       	
        }

        return $values;
    }
	
    /**
     * Return true if it's allowed to edit the mapping
     * 
     * @return boolean
     */	
	public function getAllowEdit()
	{
		$role = Mage::registry('role');
		if ($role=='view') return false;
		return true;
	}	 
}
?>
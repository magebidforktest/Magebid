<?php
/**
 * Netresearch_Magebid_Block_Adminhtml_Profile_New_Tab_Payment
 *
 * @category  Netresearch
 * @package   Netresearch_Magebid
 * @author    André Herrn <andre.herrn@netresearch.de>
 * @copyright 2010 André Herrn
 * @link      http://www.magebid.de/
*/
class Netresearch_Magebid_Block_Adminhtml_Profile_New_Tab_Payment extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Prepare Form
     *
     * @return object
     */	
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();		
		$store = Mage::app()->getStore();
		
		$yes_no_types = Mage::getSingleton('magebid/profile')->getYesNoTypes();
		
		$fieldset = $form->addFieldset('edit_magebid_payment', array('legend' => Mage::helper('magebid')->__('Payment Details')));
		
        $fieldset->addField('payment_method', 'text', array(
                'name'=>'payment_method',
                'class'=>'requried-entry',
                'value'=> '' //$product->getData('tier_price')
        ));

        $form->getElement('payment_method')->setRenderer(
            $this->getLayout()->createBlock('magebid/adminhtml_profile_new_tab_payment_method')
        ); 
				
        //$form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();	
	}
}
?>
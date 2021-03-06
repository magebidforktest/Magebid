<?php
/**
 * Mbid_Magebid_Block_Adminhtml_Auction_Edit_Tab_Details
 *
 * @category  Mbid
 * @package   Mbid_Magebid
 * @author    André Herrn <info@magebid.com>
 * @copyright 2010 André Herrn | Netresearch GmbH & Co.KG (http://www.netresearch.de)
 * @link      http://www.magebid.com/
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
class Mbid_Magebid_Block_Adminhtml_Auction_Edit_Tab_Details extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Prepare Form
     *
     * @return object
     */	
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
		$allowEdit = $this->getAllowEdit();
		if ($allowEdit) $disabled = false; else $disabled = true;
		
		$yes_no_types = Mage::getSingleton('magebid/profile')->getYesNoTypes();
		
		$details = Mage::registry('frozen_magebid')->getData();

        $form->setHtmlIdPrefix('details_');
		
		$store = Mage::app()->getStore();

        $auction = $form->addFieldset('auction_detail_form', array('legend'=>Mage::helper('magebid')->__('Details')));

        $auction->addField('auction_name', 'text', array(
            'label' => Mage::helper('magebid')->__('Auction title'),
			'name' => 'auction_name',
			'disabled' => $disabled,
        ));		
		
        $auction->addField('start_price', 'text', array(
            'name'      => 'start_price',
            'title'     => Mage::helper('magebid')->__('Start price'),
            'label'     => Mage::helper('magebid')->__('Start price'),
			'disabled' => $disabled,			
        ));		
		
        $auction->addField('fixed_price', 'text', array(
            'name'      => 'fixed_price',
            'title'     => Mage::helper('magebid')->__('Fixed price'),
            'label'     => Mage::helper('magebid')->__('Fixed price'),
			'disabled' => $disabled,
        ));		
		
	    if (Mage::registry('frozen_magebid')->getData('price_now')!="")
		{		
	        $auction->addField('price_now', 'label', array(
	            'label' => Mage::helper('magebid')->__('Current price'),
	            'type'          => 'currency',
				'currency_code' => $store->getBaseCurrency()->getCode(),
				'renderer'  =>'adminhtml/report_grid_column_renderer_currency',	
				'disabled' => $disabled,		
	        ));	 
		}  		
		
        $auction->addField('quantity', 'text', array(
            'name'      => 'quantity',
            'title'     => Mage::helper('magebid')->__('Quantity'),
            'label'     => Mage::helper('magebid')->__('Quantity'),
			'required'	=> true,
			'disabled' => $disabled,	
        ));		
		
        $auction->addField('country', 'select', array(
            'name'      => 'country',
            'title'     => Mage::helper('magebid')->__('Country'),
            'label'     => Mage::helper('magebid')->__('Country'),
			'required'	=> true,
			'disabled' => $disabled,
			'values'	=> Mage::app()->getLocale()->getCountryTranslationList(),	
        ));	
		
        $auction->addField('location', 'text', array(
            'name'      => 'location',
            'title'     => Mage::helper('magebid')->__('Location'),
            'label'     => Mage::helper('magebid')->__('Location'),
			'required'	=> true,
			'disabled' => $disabled,
        ));				
		
        $auction->addField('currency', 'select', array(
            'name'      => 'currency',
            'title'     => Mage::helper('magebid')->__('Currency'),
            'label'     => Mage::helper('magebid')->__('Currency'),
			'required'	=> true,
			'disabled' => $disabled,
			'values'	=> Mage::getSingleton('magebid/configuration')->getAvailableCurrencyCodes(),
        ));			
		
        $auction->addField('use_tax_table', 'select', array(
            'name'      => 'use_tax_table',
			'values'   => $yes_no_types,
            'title'     => Mage::helper('magebid')->__('Use Tax Table'),
            'label'     => Mage::helper('magebid')->__('Use Tax Table'),
			'required'	=> true,
			'disabled' => $disabled,
        ));		
		
        $auction->addField('vat_percent', 'text', array(
            'name'      => 'vat_percent',
            'title'     => Mage::helper('magebid')->__('VAT Percent'),
            'label'     => Mage::helper('magebid')->__('VAT Percent'),
        ));						
		
		$outputFormat = Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_MEDIUM);
        $auction->addField('start_date', 'date',array(
                'name'      =>    'start_date',
                'time'      =>    true,
                'format'    =>    $outputFormat,
           		'label'     => 	  Mage::helper('magebid')->__('Start time"'),
                'image'     =>    $this->getSkinUrl('images/grid-cal.gif'),
				'disabled' => $disabled,
            ));	
		
        $auction->addField('listing_duration', 'select', array(
            'name'      => 'listing_duration',
            'title'     => Mage::helper('magebid')->__('Duration'),
            'label'     => Mage::helper('magebid')->__('Duration'),
			'required'	=> true,	
			'values'	=> Mage::getSingleton('magebid/profile')->getDurationOptions(),	
        	'disabled' => $disabled,
        ));	
		
        $auction->addField('end_date', 'date', array(
            'label' => Mage::helper('magebid')->__('End Date'),
			'name' => 'end_date',	
            'format'    =>    $outputFormat,
           	'title'     => Mage::helper('magebid')->__('End time'),
           	'label'     => Mage::helper('magebid')->__('End time'),
			'disabled' => true,									
        ));	  		
		
        $auction->addField('dispatch_time', 'text', array(
            'name'      => 'dispatch_time',
            'title'     => Mage::helper('magebid')->__('Dispatch time'),
            'label'     => Mage::helper('magebid')->__('Dispatch time'),
			'required'	=> true,
			'note'		=> Mage::helper('magebid')->__('Days'),		
			'disabled' => $disabled,			
        ));					
		
        $auction->addField('magebid_auction_type_id', 'select', array(
            'name'      => 'magebid_auction_type_id',
            'title'     => Mage::helper('magebid')->__('Auction type'),
            'label'     => Mage::helper('magebid')->__('Auction type'),
			'values'	=> Mage::getSingleton('magebid/auction_type')->getAllAuctionTypesOptions(),	
			'required'	=> true,
			'disabled' => $disabled,	
        ));	
        
        $auction->addField('condition_id', 'select', array(
            'name'      => 'condition_id',
            'title'     => Mage::helper('magebid')->__('Condition'),
            'label'     => Mage::helper('magebid')->__('Condition'),
			'required'	=> false,
			'values'	=> Mage::getSingleton('magebid/import_category_features')->getAvailableConditions(Mage::registry('frozen_magebid')->getData('ebay_category_1')),
			'note'		=> Mage::helper('magebid')->__('Please select a category to choose this value'),
			'disabled' => $disabled,	
        ));	             
				
        //$form->setUseContainer(true);
        $form->setValues(Mage::registry('frozen_magebid')->getData());
        if ($details['start_date']!="") $form->getElement('start_date')->setValue(
                Mage::app()->getLocale()->date($details['start_date'], Varien_Date::DATETIME_INTERNAL_FORMAT)
            );
        if ($details['end_date']!="") $form->getElement('end_date')->setValue(
                Mage::app()->getLocale()->date($details['end_date'], Varien_Date::DATETIME_INTERNAL_FORMAT)
            );         
        $this->setForm($form);
        return parent::_prepareForm();	
	}
	
    /**
     * Return true if it is allowed to edit the data
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

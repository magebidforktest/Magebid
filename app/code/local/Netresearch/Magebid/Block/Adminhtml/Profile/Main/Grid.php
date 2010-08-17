<?php
/**
 * Netresearch_Magebid_Block_Adminhtml_Profile_Main_Grid
 *
 * @category  Netresearch
 * @package   Netresearch_Magebid
 * @author    André Herrn <andre.herrn@netresearch.de>
 * @copyright 2010 André Herrn
 * @link      http://www.magebid.de/
*/
class Netresearch_Magebid_Block_Adminhtml_Profile_Main_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Construct
     *
     * @return void
     */	
    public function __construct()
    {
        parent::__construct();
        $this->setId('magebid_profile_main_grid');
        $this->_controller = 'magebid';
    }

    /**
     * Prepare Collection
     *
     * @return object
     */	 
    protected function _prepareCollection()
    {
		$collection = Mage::getModel('magebid/profile')->getCollection();		
        $this->setCollection($collection);
        parent::_prepareCollection();
		
    }
	
    /**
     * Prepare Columns
     *
     * @return object
     */	
    protected function _prepareColumns()
    {

        $this->addColumn('profile_name', array(
            'header'        => Mage::helper('magebid')->__('Name'),
            'align'         => 'left',
            'width'         => '150px',
            'filter_index'  => 'profile_name',
            'index'         => 'profile_name',
        ));

        $this->addColumn('duration', array(
            'header'        => Mage::helper('magebid')->__('Duration'),
            'align'         => 'left',
            'width'         => '150px',
            'filter_index'  => 'duration',
            'index'         => 'duration',
			'format' => '$duration '.Mage::helper('magebid')->__('Days')
        ));
		
        $this->addColumn('name', array(
            'header'        => Mage::helper('magebid')->__('Auction Type'),
            'align'         => 'left',
            'width'         => '150px',
            'filter_index'  => 'name',
            'index'         => 'name',
        ));		
		
        $this->addColumn('action',
            array(
                'header'    => Mage::helper('magebid')->__('Action'),
                'width'     => '150px',
                'type'      => 'action',
                'getter'	=> 'getMagebidProfileId',
                'actions'   => array(
                    array(
                        'caption' => Mage::helper('magebid')->__('Edit'),
                        'url'     => array(
                            'base'=>'*/*/edit'
                         ),
                         'field'   => 'id'
                    ),
                    array(
                        'caption' => Mage::helper('magebid')->__('Delete'),
                        'url'     => array(
                            'base'=>'*/*/delete'
                         ),
                         'field'   => 'id'
                    )				
                ),
                'filter'    => false,
                'sortable'  => false
        ));
        return parent::_prepareColumns();
    }
    
    /**
     * Return Row-Edit-Url
     *
     * @return string
     */		
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $row->getMagebidProfileId(),
        ));
    }
}
?>

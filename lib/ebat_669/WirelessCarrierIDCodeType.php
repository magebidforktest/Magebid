<?php
// autogenerated file 18.05.2010 12:34
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 *  
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/WirelessCarrierIDCodeType.html
 *
 * @property string Cingular
 * @property string TMobile
 * @property string Sprint
 * @property string Nextel
 * @property string Verizon
 * @property string CincinnatiBell
 * @property string Dobson
 * @property string Alltel
 * @property string Leap
 * @property string USCellular
 * @property string Movistar
 * @property string Amena
 * @property string Vodafone
 * @property string ATT
 * @property string CustomCode
 */
class WirelessCarrierIDCodeType extends EbatNs_FacetType
{
	const CodeType_Cingular = 'Cingular';
	const CodeType_TMobile = 'TMobile';
	const CodeType_Sprint = 'Sprint';
	const CodeType_Nextel = 'Nextel';
	const CodeType_Verizon = 'Verizon';
	const CodeType_CincinnatiBell = 'CincinnatiBell';
	const CodeType_Dobson = 'Dobson';
	const CodeType_Alltel = 'Alltel';
	const CodeType_Leap = 'Leap';
	const CodeType_USCellular = 'USCellular';
	const CodeType_Movistar = 'Movistar';
	const CodeType_Amena = 'Amena';
	const CodeType_Vodafone = 'Vodafone';
	const CodeType_ATT = 'ATT';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('WirelessCarrierIDCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_WirelessCarrierIDCodeType = new WirelessCarrierIDCodeType();

?>
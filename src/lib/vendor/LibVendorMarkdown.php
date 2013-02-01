<?php
/*******************************************************************************
*
* @author      : Dominik Bonsch <dominik.bonsch@webfrap.net>
* @date        :
* @copyright   : Webfrap Developer Network <contact@webfrap.net>
* @project     : Webfrap Web Frame Application
* @projectUrl  : http://webfrap.net
*
* @licence     : BSD License see: LICENCE/BSD Licence.txt
* 
* @version: @package_version@  Revision: @package_revision@
*
* Changes:
*
*******************************************************************************/

// include the EZ base lib
include PATH_ROOT.'WebFrap_Vendor/vendor/ez/Base/src/base.php';

/**
 * @package WebFrap
 * @subpackage WebFrap
 *
 */
class LibVendorEz
{
  
  /**
   * Flag ob die ez components schon geladen sind
   * @param boolean
   */
  private static $loaded = false;
  
  /**
   * @return boolean
   */
  public static function isLoaded()
  {
    return self::$loaded;
  }//end public static isLoaded */
  
  /**
   * EZ loader
   */
  public static function load()
  {
    
    if( self::$loaded )
      return;

    spl_autoload_register( 'ezcBase::autoload' );
      
    self::$loaded = true;
    
  }//end public static function load */

  
}// end class LibVendorEz




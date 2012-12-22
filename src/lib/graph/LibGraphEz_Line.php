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

/**
 * @package WebFrap
 * @subpackage vendor/graph
 *
 */
class LibGraphEz_Line
  extends LibGraphEz
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////  

  /**
   * Graph type
   * @var string
   */
  public $type = 'pie';
  
////////////////////////////////////////////////////////////////////////////////
// Output
////////////////////////////////////////////////////////////////////////////////  

  /**
   * @param PBase $env
   */
  public function __construct( $env = null )
  {
    
    $this->env = $env;
    
    $this->graph = new ezcGraphLineChart();
    
  }//end public function __construct */
  
////////////////////////////////////////////////////////////////////////////////
// Output
////////////////////////////////////////////////////////////////////////////////  

  /**
   * @return void
   */
  public function render(  )
  {

    $this->setDefaultSettings();
    
    // Add data
    foreach( $this->data as $label => $data )
    {
      $this->graph->data[$label] = new ezcGraphArrayDataSet( $data );
    }
    
  }//end public function render */
  
  /**
   * 
   */
  public function setDefaultSettings()
  {
    
    $this->chooseDriver();
    
    //$this->graph->title = $this->title;
    // Set the font size for the title independently to 14
    //$this->graph->title->font->maxFontSize = 16; 
    //$this->graph->title->font->minFontSize = 10; 
    
    $this->graph->palette = new LibGraphPaletteDefault();

    $this->graph->legend->position = ezcGraph::RIGHT;
    //$this->graph->legend->landscapeSize = .5;
    $this->graph->legend->title = $this->legend; 

    // Set the maximum font size to 8 for all chart elements
    $this->graph->options->font->maxFontSize = 12;
    $this->graph->options->font->minFontSize = 10;
 
    
  }//end public function setDefaultSettings */
  

  
}// end class LibGraphEz




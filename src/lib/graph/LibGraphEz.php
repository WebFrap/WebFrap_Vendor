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

// setup der EZ components
LibVendorEz::load();

/*

<!--[if IE]>
	<embed src="path/to/image.svg"></embed>
<![endif]-->
<![if !IE]-->
  <object data="path/to/image.svg" type="image/svg+xml">
		You need a browser capeable of SVG to display this image.
  </object>
<![endif]-->

 */

/**
 * @package WebFrap
 * @subpackage vendor/graph
 *
 */
class LibGraphEz
{
  
  /**
   * @var int
   */
  public $width = 850;

  /**
   * @var int
   */
  public $height = 550;
  
  /**
   * Der Title des Graphen
   * @var string
   */
  public $title = null;
  
  /**
   * Der Title des Graphen
   * @var string
   */
  public $legend = 'Legend';
  
  /**
   * Daten zum Rendern des Graphen
   * @var LibSqlQuery
   */
  public $data = null;
  
  /**
   * Daten zum Rendern des Graphen
   * @var ezcGraph
   */
  public $graph = null;
  
  /**
   * @var string
   */
  public $fileName = null;
  
  public $font = 'data/font/default.ttf';

  /**
   * @var PBase
   */
  public $env = null;
  
////////////////////////////////////////////////////////////////////////////////
// output
////////////////////////////////////////////////////////////////////////////////  

  /**
   * @param PBase $env
   */
  public function __construct( $env = null )
  {
    $this->env = $env;
  }//end public function __construct */
  
  /**
   * @return void
   */
  public function render(  )
  {

    $this->graph = new ezcGraphLineChart();
    
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
    
    $this->graph->title = $this->title;

    $this->graph->legend->position = ezcGraph::RIGHT;
    $this->graph->legend->title = $this->legend; 

    // Set the maximum font size to 8 for all chart elements
    $this->graph->options->font->maxFontSize = 12;
    $this->graph->options->font->minFontSize = 10;
    
    // Set the font size for the title independently to 14
    $this->graph->title->font->maxFontSize = 16; 
    $this->graph->title->font->minFontSize = 10; 
    
  }//end public function setDefaultSettings */
  
  /**
   * 
   */
  public function chooseDriver()
  {
    
    $this->graph->driver = new ezcGraphGdDriver();
    $this->graph->options->font = PATH_FW.$this->font;

    $this->graph->driver->options->supersampling = 1;
    //$this->graph->driver->options->jpegQuality = 100;
    $this->graph->driver->options->imageFormat = IMG_PNG; 
    
  }//end public function chooseDriver */

  /**
   * @param string $name
   */
  public function out( $name = null )
  {
    
    //header('Content-Type: image/jpeg');
    //if( $name )
      //header('Content-Disposition: attachment;filename="'.urlencode($name).'"');

    $this->graph->renderToOutput( $this->width, $this->height );
    
  }//end public function out */
  
}// end class LibGraphEz




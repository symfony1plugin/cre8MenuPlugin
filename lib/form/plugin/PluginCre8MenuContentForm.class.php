<?php

/**
 * Cre8MenuContent form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PluginCre8MenuContentForm extends BaseCre8MenuContentForm
{
  
  /**
   * @var Cre8ContentType
   */
  public $contentType = null;
  
  public function configure()
  {
    parent::configure();
    
    unset(
      $this['slug'],
      $this['uuid'],
      $this['created_at'],
      $this['updated_at']
    );
    
    
    if(! $this->getObject()->isNew())
    {
      
      /**
       * CONTENT TYPE:
       */
      $contentType = $this->getObject()->getCre8ContentType();
      $this->contentType = $contentType;
      
      switch($contentType->getName())
      {
        case 'cms':
          $menuContentTypeCmss = $this->getObject()->getCre8MenuContentTypeCmss();
          $menuContentTypeCms = $menuContentTypeCmss ? $menuContentTypeCmss[0] : null;
          if(is_null($menuContentTypeCms)) {
            $menuContentTypeCms = new Cre8MenuContentTypeCms();
            $menuContentTypeCms->setCre8MenuContent($this->getObject());
          }
          
          $cmsForm = new Cre8MenuContentTypeCmsForm($menuContentTypeCms);
          unset($cmsForm['cre8_menu_content_id']);
          $this->embedForm('cms', $cmsForm);
          break;
          
        case 'internal_link':
        	
          $menuContentTypeCmss = $this->getObject()->getCre8MenuContentTypeInternalLinks();
          $menuContentTypeCms = $menuContentTypeCmss ? $menuContentTypeCmss[0] : null;
          if(is_null($menuContentTypeCms)) {
            $menuContentTypeCms = new Cre8MenuContentTypeInternalLink();
            $menuContentTypeCms->setCre8MenuContent($this->getObject());
          }
          
          $cmsForm = new Cre8MenuContentTypeInternalLinkForm($menuContentTypeCms);
          unset($cmsForm['cre8_menu_content_id']);
          $this->embedForm('cms', $cmsForm);
          break;
      }
      
      foreach(sfConfig::get('app_cre8_menu_extra_class', array()) as $class)
      {
        
      }
      
      
    }
    
    
  }
  
  
  public function bind(array $taintedValues = null, array $taintedFiles = null) 
  {
    /*
    if(!$this->isNew())
    {
            
    }
    */
  	// call parent bind method
  	parent::bind($taintedValues, $taintedFiles);
  }
}

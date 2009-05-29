<?php

/**
 * Cre8MenuContent form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class Cre8MenuContentForm extends BaseCre8MenuContentForm
{
  public function configure()
  {
//    $o = new MenuContent();
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
          $this->embedForm('cms', $cmsForm);
//          unset($this['content_type_id']);
          break;
          
        case 'internal_link':
        	
          $menuContentTypeCmss = $this->getObject()->getCre8MenuContentTypeInternalLinks();
          $menuContentTypeCms = $menuContentTypeCmss ? $menuContentTypeCmss[0] : null;
          if(is_null($menuContentTypeCms)) {
            $menuContentTypeCms = new MenuContentTypeInternalLink();
            $menuContentTypeCms->setMenuContent($this->getObject());
          }
          
          $cmsForm = new MenuContentTypeInternalLinkForm($menuContentTypeCms);
          $this->embedForm('cms', $cmsForm);
//          unset($this['content_type_id']);
        	break;
      }
      
      
      
      /**
       * BANNER TYPE:
       */
      if($bannerComponent = $this->getObject()->getBannerComponent())
      {
        $type = $bannerComponent->getInternalName();
        $objType = 'BannerComponent' . ucwords($type);
        $getter = 'get' . $objType . 's';
        $objBannerComponents = $this->getObject()->$getter();
        $objBannerComponent  = $objBannerComponents ? $objBannerComponents[0] : null;
        if(is_null($objBannerComponent)) {
           $objBannerComponent = new $objType();
           $objBannerComponent->setMenuContent($this->getObject());
        }
        $objTypeForm = $objType . 'Form';
        if($bannerComponent->getIsMulti()) 
        {
          foreach($objBannerComponents as $bannerObj)
          {
            $bannerComponentMultiFrm = new $objTypeForm($bannerObj);
            unset($bannerComponentMultiFrm['menu_content_id']);
            $bannerComponentMultiFrm->setWidget('name', new sfWidgetFormUploadDelete(array('url' => 'menuContent/deleteBannerMultiImage', 'img_path' => '/uploads/img/' . $bannerObj->getName(), 'model_id' => $bannerObj->getId(), 'confirm' => 'Are you sure?')));
            $this->embedForm('edit_multi_banner_img_' . $bannerObj->getId(), $bannerComponentMultiFrm);
          }
          $bannerComponentForm = new $objTypeForm();
        } else {
          $bannerComponentForm = new $objTypeForm($objBannerComponent);
        }
        unset($bannerComponentForm['menu_content_id']);
        $this->embedForm('banner', $bannerComponentForm);
      }
      
    }
    
    
  }
  
  
  public function bind(array $taintedValues = null, array $taintedFiles = null) 
  {
    /*
    echo '<pre>';
    print_r(array(
      'type' => 'before',
      'values' => $taintedValues,
      'files'  => $taintedFiles
    ));
    echo '</pre>';
    die();
    */
    if($this->isNew())
    {
      
    }
    else 
    {
      $bannerTypes = array(
        'old_banner_type_id' => (int) $this->getObject()->getBannerComponentId(),
        'new_banner_type_id' => (int) $taintedValues['banner_component_id']
      );
      if( ($this->getObject()->getBannerComponentId() != $taintedValues['banner_component_id']) && $bannerTypes['old_banner_type_id'])
      {
        unset(
          $taintedValues['banner'],
          $this->embeddedForms['banner']
        );
        $this->validatorSchema['banner'] = new sfValidatorPass();
      }
      
      if($bannerTypes['new_banner_type_id'] == 3)
      {
        if(! $taintedFiles['name']['banner']['name']) 
        {
          unset(
            $taintedValues['banner'],
            $this->embeddedForms['banner']
          );
          $this->validatorSchema['banner'] = new sfValidatorPass();
        }
      }
      
      if(isset($this->embeddedForms['banner']))
      {
        $this->embeddedForms['banner']->getObject()->setMenuContent($this->getObject());
      }
      
      
    }
    
    /*
    echo '<pre>';
    print_r(array(
      'modified_columns' => $this->getObject()->getModifiedColumns()
    ));
    echo '</pre>';
    die();
    */
      
    
  	// call parent bind method
  	parent::bind($taintedValues, $taintedFiles);
  }
}

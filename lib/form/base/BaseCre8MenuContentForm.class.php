<?php

/**
 * Cre8MenuContent form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MenuContentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'cre8_menu_type_id'          => new sfWidgetFormPropelChoice(array('model' => 'Cre8MenuType', 'add_empty' => false)),
      'name'                       => new sfWidgetFormInput(),
      'cre8_content_type_id'       => new sfWidgetFormPropelChoice(array('model' => 'Cre8ContentType', 'add_empty' => false)),
      'slug'                       => new sfWidgetFormInput(),
      'meta_title'                 => new sfWidgetFormInput(),
      'meta_description'           => new sfWidgetFormTextarea(),
      'meta_keywords'              => new sfWidgetFormTextarea(),
      'template'                   => new sfWidgetFormInput(),
      'is_active'                  => new sfWidgetFormInputCheckbox(),
      'is_hidden'                  => new sfWidgetFormInputCheckbox(),
      'rank'                       => new sfWidgetFormInput(),
      'menu_footer_link_menu_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'MenuFooterLink')),
      'menu_top_banner_list'       => new sfWidgetFormPropelChoiceMany(array('model' => 'TopBanner')),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'Cre8MenuContent', 'column' => 'id', 'required' => false)),
      'cre8_menu_type_id'          => new sfValidatorPropelChoice(array('model' => 'Cre8MenuType', 'column' => 'id')),
      'name'                       => new sfValidatorString(array('max_length' => 40)),
      'cre8_content_type_id'       => new sfValidatorPropelChoice(array('model' => 'Cre8ContentType', 'column' => 'id')),
      'slug'                       => new sfValidatorString(array('max_length' => 60)),
      'meta_title'                 => new sfValidatorString(array('max_length' => 70, 'required' => false)),
      'meta_description'           => new sfValidatorString(array('required' => false)),
      'meta_keywords'              => new sfValidatorString(array('required' => false)),
      'template'                   => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'is_active'                  => new sfValidatorBoolean(array('required' => false)),
      'is_hidden'                  => new sfValidatorBoolean(array('required' => false)),
      'rank'                       => new sfValidatorInteger(),
      'menu_footer_link_menu_list' => new sfValidatorPropelChoiceMany(array('model' => 'MenuFooterLink', 'required' => false)),
      'menu_top_banner_list'       => new sfValidatorPropelChoiceMany(array('model' => 'TopBanner', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_menu_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8MenuContent';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['menu_footer_link_menu_list']))
    {
      $values = array();
      foreach ($this->object->getMenuFooterLinkMenus() as $obj)
      {
        $values[] = $obj->getMenuFooterLinkId();
      }

      $this->setDefault('menu_footer_link_menu_list', $values);
    }

    if (isset($this->widgetSchema['menu_top_banner_list']))
    {
      $values = array();
      foreach ($this->object->getMenuTopBanners() as $obj)
      {
        $values[] = $obj->getTopBannerId();
      }

      $this->setDefault('menu_top_banner_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveMenuFooterLinkMenuList($con);
    $this->saveMenuTopBannerList($con);
  }

  public function saveMenuFooterLinkMenuList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['menu_footer_link_menu_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(MenuFooterLinkMenuPeer::CRE8_MENU_CONTENT_ID, $this->object->getPrimaryKey());
    MenuFooterLinkMenuPeer::doDelete($c, $con);

    $values = $this->getValue('menu_footer_link_menu_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new MenuFooterLinkMenu();
        $obj->setCre8MenuContentId($this->object->getPrimaryKey());
        $obj->setMenuFooterLinkId($value);
        $obj->save();
      }
    }
  }

  public function saveMenuTopBannerList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['menu_top_banner_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(MenuTopBannerPeer::CRE8_MENU_CONTENT_ID, $this->object->getPrimaryKey());
    MenuTopBannerPeer::doDelete($c, $con);

    $values = $this->getValue('menu_top_banner_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new MenuTopBanner();
        $obj->setCre8MenuContentId($this->object->getPrimaryKey());
        $obj->setTopBannerId($value);
        $obj->save();
      }
    }
  }

}

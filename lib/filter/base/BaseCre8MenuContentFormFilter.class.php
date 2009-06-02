<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Cre8MenuContent filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MenuContentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cre8_menu_type_id'          => new sfWidgetFormPropelChoice(array('model' => 'Cre8MenuType', 'add_empty' => true)),
      'name'                       => new sfWidgetFormFilterInput(),
      'cre8_content_type_id'       => new sfWidgetFormPropelChoice(array('model' => 'Cre8ContentType', 'add_empty' => true)),
      'slug'                       => new sfWidgetFormFilterInput(),
      'meta_title'                 => new sfWidgetFormFilterInput(),
      'meta_description'           => new sfWidgetFormFilterInput(),
      'meta_keywords'              => new sfWidgetFormFilterInput(),
      'template'                   => new sfWidgetFormFilterInput(),
      'is_active'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_hidden'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'rank'                       => new sfWidgetFormFilterInput(),
      'menu_footer_link_menu_list' => new sfWidgetFormPropelChoice(array('model' => 'MenuFooterLink', 'add_empty' => true)),
      'menu_top_banner_list'       => new sfWidgetFormPropelChoice(array('model' => 'TopBanner', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cre8_menu_type_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cre8MenuType', 'column' => 'id')),
      'name'                       => new sfValidatorPass(array('required' => false)),
      'cre8_content_type_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cre8ContentType', 'column' => 'id')),
      'slug'                       => new sfValidatorPass(array('required' => false)),
      'meta_title'                 => new sfValidatorPass(array('required' => false)),
      'meta_description'           => new sfValidatorPass(array('required' => false)),
      'meta_keywords'              => new sfValidatorPass(array('required' => false)),
      'template'                   => new sfValidatorPass(array('required' => false)),
      'is_active'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_hidden'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'rank'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'menu_footer_link_menu_list' => new sfValidatorPropelChoice(array('model' => 'MenuFooterLink', 'required' => false)),
      'menu_top_banner_list'       => new sfValidatorPropelChoice(array('model' => 'TopBanner', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_menu_content_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addMenuFooterLinkMenuListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(MenuFooterLinkMenuPeer::CRE8_MENU_CONTENT_ID, Cre8MenuContentPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(MenuFooterLinkMenuPeer::MENU_FOOTER_LINK_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(MenuFooterLinkMenuPeer::MENU_FOOTER_LINK_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addMenuTopBannerListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(MenuTopBannerPeer::CRE8_MENU_CONTENT_ID, Cre8MenuContentPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(MenuTopBannerPeer::TOP_BANNER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(MenuTopBannerPeer::TOP_BANNER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Cre8MenuContent';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'cre8_menu_type_id'          => 'ForeignKey',
      'name'                       => 'Text',
      'cre8_content_type_id'       => 'ForeignKey',
      'slug'                       => 'Text',
      'meta_title'                 => 'Text',
      'meta_description'           => 'Text',
      'meta_keywords'              => 'Text',
      'template'                   => 'Text',
      'is_active'                  => 'Boolean',
      'is_hidden'                  => 'Boolean',
      'rank'                       => 'Number',
      'menu_footer_link_menu_list' => 'ManyKey',
      'menu_top_banner_list'       => 'ManyKey',
    );
  }
}

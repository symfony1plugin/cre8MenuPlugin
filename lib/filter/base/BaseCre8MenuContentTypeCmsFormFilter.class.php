<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Cre8MenuContentTypeCms filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MenuContentTypeCmsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cre8_menu_content_id' => new sfWidgetFormPropelChoice(array('model' => 'Cre8MenuContent', 'add_empty' => true)),
      'content'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cre8_menu_content_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cre8MenuContent', 'column' => 'id')),
      'content'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_menu_content_type_cms_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8MenuContentTypeCms';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'cre8_menu_content_id' => 'ForeignKey',
      'content'              => 'Text',
    );
  }
}

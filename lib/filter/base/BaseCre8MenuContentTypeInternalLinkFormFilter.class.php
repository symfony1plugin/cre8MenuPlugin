<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Cre8MenuContentTypeInternalLink filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MenuContentTypeInternalLinkFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cre8_menu_content_id' => new sfWidgetFormPropelChoice(array('model' => 'Cre8MenuContent', 'add_empty' => true)),
      'module'               => new sfWidgetFormFilterInput(),
      'action'               => new sfWidgetFormFilterInput(),
      'parameters'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cre8_menu_content_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cre8MenuContent', 'column' => 'id')),
      'module'               => new sfValidatorPass(array('required' => false)),
      'action'               => new sfValidatorPass(array('required' => false)),
      'parameters'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_menu_content_type_internal_link_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8MenuContentTypeInternalLink';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'cre8_menu_content_id' => 'ForeignKey',
      'module'               => 'Text',
      'action'               => 'Text',
      'parameters'           => 'Text',
    );
  }
}

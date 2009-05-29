<?php

/**
 * Cre8MenuContentTypeCms form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MenuContentTypeCmsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'cre8_menu_content_id' => new sfWidgetFormPropelChoice(array('model' => 'Cre8MenuContent', 'add_empty' => false)),
      'content'              => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Cre8MenuContentTypeCms', 'column' => 'id', 'required' => false)),
      'cre8_menu_content_id' => new sfValidatorPropelChoice(array('model' => 'Cre8MenuContent', 'column' => 'id')),
      'content'              => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_menu_content_type_cms[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8MenuContentTypeCms';
  }


}

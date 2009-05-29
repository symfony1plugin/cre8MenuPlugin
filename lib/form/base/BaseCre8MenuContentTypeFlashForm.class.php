<?php

/**
 * Cre8MenuContentTypeFlash form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MenuContentTypeFlashForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'cre8_menu_content_id' => new sfWidgetFormPropelChoice(array('model' => 'Cre8MenuContent', 'add_empty' => false)),
      'file_name'            => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Cre8MenuContentTypeFlash', 'column' => 'id', 'required' => false)),
      'cre8_menu_content_id' => new sfValidatorPropelChoice(array('model' => 'Cre8MenuContent', 'column' => 'id')),
      'file_name'            => new sfValidatorString(array('max_length' => 128)),
    ));

    $this->widgetSchema->setNameFormat('cre8_menu_content_type_flash[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8MenuContentTypeFlash';
  }


}

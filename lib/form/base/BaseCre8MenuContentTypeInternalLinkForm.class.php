<?php

/**
 * Cre8MenuContentTypeInternalLink form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseCre8MenuContentTypeInternalLinkForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'cre8_menu_content_id' => new sfWidgetFormPropelChoice(array('model' => 'Cre8MenuContent', 'add_empty' => false)),
      'module'               => new sfWidgetFormInput(),
      'action'               => new sfWidgetFormInput(),
      'parameters'           => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Cre8MenuContentTypeInternalLink', 'column' => 'id', 'required' => false)),
      'cre8_menu_content_id' => new sfValidatorPropelChoice(array('model' => 'Cre8MenuContent', 'column' => 'id')),
      'module'               => new sfValidatorString(array('max_length' => 255)),
      'action'               => new sfValidatorString(array('max_length' => 255)),
      'parameters'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_menu_content_type_internal_link[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8MenuContentTypeInternalLink';
  }


}

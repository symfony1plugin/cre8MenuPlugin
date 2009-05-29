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
      'id'                   => new sfWidgetFormInputHidden(),
      'cre8_menu_type_id'    => new sfWidgetFormPropelChoice(array('model' => 'Cre8MenuType', 'add_empty' => false)),
      'name'                 => new sfWidgetFormInput(),
      'cre8_content_type_id' => new sfWidgetFormPropelChoice(array('model' => 'Cre8ContentType', 'add_empty' => false)),
      'slug'                 => new sfWidgetFormInput(),
      'meta_title'           => new sfWidgetFormInput(),
      'meta_description'     => new sfWidgetFormInput(),
      'meta_keywords'        => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Cre8MenuContent', 'column' => 'id', 'required' => false)),
      'cre8_menu_type_id'    => new sfValidatorPropelChoice(array('model' => 'Cre8MenuType', 'column' => 'id')),
      'name'                 => new sfValidatorString(array('max_length' => 40)),
      'cre8_content_type_id' => new sfValidatorPropelChoice(array('model' => 'Cre8ContentType', 'column' => 'id')),
      'slug'                 => new sfValidatorString(array('max_length' => 60)),
      'meta_title'           => new sfValidatorString(array('max_length' => 70, 'required' => false)),
      'meta_description'     => new sfValidatorString(array('max_length' => 155, 'required' => false)),
      'meta_keywords'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_menu_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8MenuContent';
  }


}

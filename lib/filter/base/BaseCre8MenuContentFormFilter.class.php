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
      'cre8_menu_type_id'    => new sfWidgetFormPropelChoice(array('model' => 'Cre8MenuType', 'add_empty' => true)),
      'name'                 => new sfWidgetFormFilterInput(),
      'cre8_content_type_id' => new sfWidgetFormPropelChoice(array('model' => 'Cre8ContentType', 'add_empty' => true)),
      'slug'                 => new sfWidgetFormFilterInput(),
      'meta_title'           => new sfWidgetFormFilterInput(),
      'meta_description'     => new sfWidgetFormFilterInput(),
      'meta_keywords'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cre8_menu_type_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cre8MenuType', 'column' => 'id')),
      'name'                 => new sfValidatorPass(array('required' => false)),
      'cre8_content_type_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cre8ContentType', 'column' => 'id')),
      'slug'                 => new sfValidatorPass(array('required' => false)),
      'meta_title'           => new sfValidatorPass(array('required' => false)),
      'meta_description'     => new sfValidatorPass(array('required' => false)),
      'meta_keywords'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cre8_menu_content_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cre8MenuContent';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'cre8_menu_type_id'    => 'ForeignKey',
      'name'                 => 'Text',
      'cre8_content_type_id' => 'ForeignKey',
      'slug'                 => 'Text',
      'meta_title'           => 'Text',
      'meta_description'     => 'Text',
      'meta_keywords'        => 'Text',
    );
  }
}

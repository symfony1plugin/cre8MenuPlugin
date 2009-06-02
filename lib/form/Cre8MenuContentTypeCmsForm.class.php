<?php

/**
 * Cre8MenuContentTypeCms form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class Cre8MenuContentTypeCmsForm extends BaseCre8MenuContentTypeCmsForm
{
  public function configure()
  {
    $this->setWidget('content', new fckFormWidget(array(), array('height' => 400, 'width' => 600)));
  }
}

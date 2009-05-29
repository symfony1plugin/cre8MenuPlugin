<?php

class Cre8MenuContent extends PluginCre8MenuContent
{
}

sfPropelBehavior::add('Cre8MenuContent', array('sfPropelUuidBehavior'));

$columns_map = array('from'   => Cre8MenuContentPeer::NAME,
                     'to'     => Cre8MenuContentPeer::SLUG);

sfPropelBehavior::add('Cre8MenuContent', array('sfPropelActAsSluggableBehavior' => array('columns' => $columns_map, 'separator' => '-', 'permanent' => true)));

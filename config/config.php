<?php

if (sfConfig::get('app_cre8_menu_plugin_routes_register', true))
{
  if(in_array('cre8MenuAdmin', sfConfig::get('sf_enabled_modules', array()))) {
    $this->dispatcher->connect('routing.load_configuration', array('cre8MenuRouting', 'addRouteForAdminMenu'));
  }
  
  if(in_array('cre8MenuTypeAdmin', sfConfig::get('sf_enabled_modules', array()))) {
    $this->dispatcher->connect('routing.load_configuration', array('cre8MenuRouting', 'addRouteForAdminMenuType'));
  }
  
  
}
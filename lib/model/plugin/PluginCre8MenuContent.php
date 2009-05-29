<?php

class PluginCre8MenuContent extends BaseCre8MenuContent 
{
  public function __toString()
  {
  	return $this->getName();
  }
}
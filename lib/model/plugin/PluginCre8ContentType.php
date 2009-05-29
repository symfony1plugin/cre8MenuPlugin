<?php

class PluginCre8ContentType extends BaseCre8ContentType
{
  public function __toString()
  {
    return $this->getName();
  }
}

<?php

class PluginCre8MenuContentPeer extends BaseCre8MenuContentPeer
{
  static public function getBySlug($slug)
  {
    if(!$slug) return false;
    
    $c = new Criteria();
    $c->add(self::SLUG, $slug);
    return self::doSelectOne($c);
  }
}

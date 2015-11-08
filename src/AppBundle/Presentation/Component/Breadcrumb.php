<?php

namespace SF2wDDD\AppBundle\Presentation\Component;

class Breadcrumb
{
    public $segment = array();

    public function setBaseSegment($base)
    {
        $this->segment['base'] = $base;
    }

    public function setActiveSegment($active)
    {
        $this->segment['active'] = $active;
    }
} 
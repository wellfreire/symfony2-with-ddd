<?php

namespace SF2wDDD\AppBundle\Controller;

use SF2wDDD\AppBundle\Presentation\TemplateConfig;
use SF2wDDD\AppBundle\Presentation\TemplateResponse;

class WebController extends BaseController
{
    protected function fromTemplateResponse(TemplateResponse $response)
    {
        return $this->render(
            $response->templatePath(), 
            array_merge(
                TemplateConfig::globalConfig(),
                $response->templateParams()
            )
        );
    }
}
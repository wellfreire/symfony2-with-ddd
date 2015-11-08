<?php

namespace SF2wDDD\AppBundle\Presentation;

class TemplateResponse
{
    private static $baseTemplatePath = '@AppBundle/Resources/views/';

    /**
     * @var string
     */
    private $templateName;

    /**
     * @var array
     */
    private $templateParams;

    public function __construct($templateName, array $templateParams = array())
    {
        $this->setTemplateName($templateName);
        $this->setTemplateParams($templateParams);
    }

    /**
     * Returns the complete path for the template name
     *
     * @return string
     */
    public function templatePath()
    {
        return self::$baseTemplatePath . '/' . trim($this->templateName(), '/');
    }

    /**
     * @return array
     */
    public function templateParams()
    {
        return $this->templateParams;
    }

    /**
     * @return string
     */
    public function templateName()
    {
        return $this->templateName;
    }

    private function setTemplateParams($templateParams)
    {
        $this->templateParams = $templateParams;
    }

    private function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
    }
} 
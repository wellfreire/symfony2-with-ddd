<?php

namespace SF2wDDD\AppBundle\Controller;

use SF2wDDD\AppBundle\Service\AppServiceResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class ApiController extends BaseController
{
    /** @var SymfonyRequest **/
    protected $request;

    /** @var SymfonyResponse **/
    protected $response;

    protected function requestData()
    {
        $requestData = [];
        foreach (json_decode($this->request->getContent()) as $param) {
            $requestData[$param->name] = $param->value;
        }
        return $requestData;
    }

    protected function answerFromServiceResponse(AppServiceResponse $serviceResponse)
    {
        $this->response = new JsonResponse();
        if ($serviceResponse->isSuccess()) {
            return $this->successResponse($serviceResponse->data());
        }
        return $this->errorResponse($serviceResponse->errorsAsArray());
    }

    private function successResponse($responseData)
    {
        $this->response->setData($responseData);
        return $this->response;
    }

    private function errorResponse(array $errorsList)
    {
        $responseData = [];
        foreach ($errorsList as $errorIndex => $error) {
            $responseData[$errorIndex] = (string) $error;
        }
        $this->response->setStatusCode(SymfonyResponse::HTTP_BAD_REQUEST);
        $this->response->setData($responseData);
        return $this->response;
    }
}
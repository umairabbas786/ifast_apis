<?php

use paragraph1\phpFCM\Client as FcmClient;
use GuzzleHttp\Client as GuzzleHttpClient;

abstract class ElectroApi {
    use Environment;

    const __API_KEY__ = '__api_key__';

    private AppDB $appDB;
    private Magician $magician;

    public function getAppDB(): AppDB {
        if (!isset($this->appDB)) {
            $this->appDB = new AppDB();
        }
        return $this->appDB;
    }

    public function getMagician(): Magician {
        if (!isset($this->magician)) {
            $this->magician = new Magician();
        }
        return $this->magician;
    }

    public function getFcmClient(): FcmClient {
        $fcmClient = new FcmClient();
        $fcmClient->setApiKey(Manifest::FCM_SERVER_API_KEY);
        $fcmClient->injectHttpClient(new GuzzleHttpClient());
        return $fcmClient;
    }

    public function killAsUnAuthorizedRequest() {
        ElectroResponse::prepare()->setResponseState(ElectroResponse::RESPONSE_STATE_UNAUTHORIZED)->send();
    }

    public function killAsCompromised(array $exceptions) {
        ElectroResponse::prepare()->setResponseState(ElectroResponse::RESPONSE_STATE_COMPROMISED)
            ->setResponseData(ElectroResponse::createDataWithExceptions($exceptions))
            ->send();
    }

    public function killAsFailure(array $exceptions) {
        ElectroResponse::prepare()->setResponseState(ElectroResponse::RESPONSE_STATE_FAILURE)
            ->setResponseData(ElectroResponse::createDataWithExceptions($exceptions))
            ->send();
    }

    public function resSendOK(array $data, bool $kill = true) {
        ElectroResponse::prepare()->setResponseState(ElectroResponse::RESPONSE_STATE_OK)
            ->setResponseData($data)
            ->send($kill);
    }

    public function killAsBadRequest() {
        ElectroResponse::prepare()->setResponseState(ElectroResponse::RESPONSE_STATE_BAD_REQUEST)->send();
    }

    public function killAsBadRequestWithInvalidValueForParam(string $param) {
        $response = ElectroResponse::prepare()->setResponseState(ElectroResponse::RESPONSE_STATE_BAD_REQUEST);

        if (Manifest::DEBUG_MODE) {
            $response = $response->setResponseData(ElectroResponse::createDataWithExceptions([
                'invalid_value_of_param' => $param
            ]));
        }

        $response->send();
    }

    public function killAsBadRequestWithMissingParamException(string $param) {
        $response = ElectroResponse::prepare()->setResponseState(ElectroResponse::RESPONSE_STATE_BAD_REQUEST);

        if (Manifest::DEBUG_MODE) {
            $response = $response->setResponseData(ElectroResponse::createDataWithExceptions([
                'missing_param' => $param
            ]));
        }

        $response->send();
    }

    protected function onSetDefaultTimeZone() {
        date_default_timezone_set("Asia/Karachi");
    }

    protected function onSetDefaultHeaders() {
        header('Access-Control-Allow-Origin: *'); // To Allow xmlHttpRequests
        header('Access-Control-Allow-Methods: *'); // To Allow xmlHttpRequests
        header('Access-Control-Allow-Headers: *'); // To Allow xmlHttpRequests
    }

    protected function onSetDefaultContentType() {
        header('Content-type:application/json; charset=utf-8');
    }

    protected function onInvalidRequestMethod() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $response = ElectroResponse::prepare()->setResponseState(ElectroResponse::RESPONSE_STATE_BAD_REQUEST);

            if (Manifest::DEBUG_MODE) {
                $response = $response->setResponseData(ElectroResponse::createDataWithExceptions([
                    'invalid_request_method' => $_SERVER['REQUEST_METHOD'],
                    'required' => 'POST'
                ]));
            }

            $response->send();
        }
    }

    protected function onApiKeyCheck() {
        if (!isset($_POST[self::__API_KEY__]) || $_POST[self::__API_KEY__] !== Manifest::API_KEY) {
            if (Manifest::DEBUG_MODE) {
                if (!isset($_POST[self::__API_KEY__])) {
                    $this->killAsBadRequestWithMissingParamException(self::__API_KEY__);
                }
                $this->killAsBadRequestWithInvalidValueForParam(self::__API_KEY__);
            }
            $this->killAsUnAuthorizedRequest();
        }
    }

    public function onMaintenanceModeCheck() {
        if (Manifest::MAINTENANCE_MODE) {
            ElectroResponse::prepare()->setResponseState(ElectroResponse::RESPONSE_STATE_UNDER_MAINTENANCE)->send();
        }
    }

    protected function onAssemble() {}
    abstract protected function onDevise();

    public function launch() {
        $this->onInvalidRequestMethod();
        $this->onApiKeyCheck();
        $this->onMaintenanceModeCheck();
        $this->onSetDefaultTimeZone();
        $this->onSetDefaultHeaders();
        $this->onSetDefaultContentType();
        $this->onAssemble();
        $this->onDevise();
        if ($this->appDB !== null) {
            $this->appDB->closeConnection();
        }
    }
}

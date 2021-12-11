<?php


class ElectroResponse {
    const RESPONSE_STATE_OK = "OK";
    const RESPONSE_STATE_UNDER_MAINTENANCE = "UNDER_MAINTENANCE";
    const RESPONSE_STATE_UNAUTHORIZED = "UNAUTHORIZED";
    const RESPONSE_STATE_COMPROMISED = "COMPROMISED";
    const RESPONSE_STATE_BAD_REQUEST = "BAD_REQUEST";
    const RESPONSE_STATE_FAILURE = "FAILURE";

    private string $response_state;
    private array $data;

    private function __construct() { }

    public function setResponseState(string $responseState): ElectroResponse {
        $this->response_state = $responseState;
        return $this;
    }

    public function setResponseData(array $data): ElectroResponse {
        $this->data = $data;
        return $this;
    }

    public function send(bool $kill = true) {
        $response = array();

        if (isset($this->response_state)) {
            $response["state"] = $this->response_state;
        }

        if (isset($this->data)) {
            $response["data"] = $this->data;
        }

        $response = json_encode($response);

        if ($kill) die($response);
        echo $response;
    }

    public static function mapExceptionsToData(&$data, array $exceptions) {
        $data['exceptions'] = $exceptions;
    }

    public static function createDataWithExceptions(array $exceptions): array {
        $data = [];
        self::mapExceptionsToData($data, $exceptions);
        return $data;
    }

    public static function prepare(): ElectroResponse {
        return new ElectroResponse();
    }
}
<?php

trait Environment {

    private function getServerNameWithAvailableProtocol(): string {
        $server_name = $_SERVER["SERVER_NAME"];
        return 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $server_name;
    }

    private function getServerUrlUptoDataDir(): string {
        return $this->getServerNameWithAvailableProtocol() . "/data";
    }

    public function getDataDirectoryPath(): string {
        return Manifest::getAppSystemRoot() . "/data";
    }

    /**
     * <UserAvatarImage>
     */
    public function getUserAvatarImageDirPath(): string {
        return $this->getDataDirectoryPath() . '/images/users';
    }

    public function createLinkForUserAvatarImage(string $file_name): string {
        return $this->getServerUrlUptoDataDir() . "/images/users/" . $file_name;
    }
    /** ----------------- </UserAvatarImage> */

    /**
     * <DriverImage>
     */
    public function getDriverImageDirPath(): string {
        return $this->getDataDirectoryPath() . '/images/drivers';
    }

    public function createLinkForDriverImage(string $file_name): string {
        return $this->getServerUrlUptoDataDir() . "/images/drivers/" . $file_name;
    }
    /** ----------------- </DriverImage> */

    /**
     * <DeliveryProofImage>
     */
    public function getDeliveryProofImageDirPath(): string {
        return $this->getDataDirectoryPath() . '/images/proof';
    }

    public function createLinkForDeliveryProofImage(string $file_name): string {
        return $this->getServerUrlUptoDataDir() . "/images/proof/" . $file_name;
    }
    /** ----------------- </DeliveryProofImage> */

}

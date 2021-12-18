<?php

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class ConfirmDeliveryRequest extends ElectroApi {

    const DELIVERY_ID = "delivery_id";
    const CUSTOMER_ID = "customer_id";
    const DRIVER_ID = "driver_id";
    const LOCATION = "location";
    const NUMBER_PLATE = "number_plate";
    const FACE_PICTURE = "face_proof";
    const BEFORE_ITEMS = "before_delivery_items";
    const AFTER_ITEMS = "after_delivery_items";

    protected function onAssemble() {
        $required_fields = [
            self::DELIVERY_ID,
            self::CUSTOMER_ID,
            self::DRIVER_ID,
            self::LOCATION
        ];

        foreach ($required_fields as $required_field) {
            if (!isset($_POST[$required_field])) {
                $this->killAsBadRequestWithMissingParamException($required_field);
            }
        }

//        if (!isset($_FILES[self::NUMBER_PLATE])) {
//            $this->killAsBadRequestWithMissingParamException(self::NUMBER_PLATE);
//        }
//        if (!isset($_FILES[self::FACE_PICTURE])) {
//            $this->killAsBadRequestWithMissingParamException(self::FACE_PICTURE);
//        }
//        if (!isset($_FILES[self::BEFORE_ITEMS])) {
//            $this->killAsBadRequestWithMissingParamException(self::BEFORE_ITEMS);
//        }
//        if (!isset($_FILES[self::AFTER_ITEMS])) {
//            $this->killAsBadRequestWithMissingParamException(self::AFTER_ITEMS);
//        }
    }

    protected function onDevise() {

        $numberPlateGeneratedName = "";
        $isNumberPlateImageSaved = ImageUploader::withSrc($_FILES[self::NUMBER_PLATE]['tmp_name'])
            ->destinationDir($this->getDriverImageDirPath())
            ->generateUniqueName($_FILES[self::NUMBER_PLATE]['name'])
            ->mapGeneratedName($numberPlateGeneratedName)
            ->compressQuality(75)
            ->save();
        if(!$isNumberPlateImageSaved){
            $this->killAsFailure([
                "failed_to_save_number_plate_image"=> true
            ]);
        }

        $facePictureGeneratedName = "";
        $isFacePictureImageSaved = ImageUploader::withSrc($_FILES[self::FACE_PICTURE]['tmp_name'])
            ->destinationDir($this->getDriverImageDirPath())
            ->generateUniqueName($_FILES[self::FACE_PICTURE]['name'])
            ->mapGeneratedName($facePictureGeneratedName)
            ->compressQuality(75)
            ->save();
        if(!$isFacePictureImageSaved){
            $this->killAsFailure([
                "failed_to_save_face_image"=> true
            ]);
        }

        $beforeItemsGeneratedName = "";
        $isBeforeItemsImageSaved = ImageUploader::withSrc($_FILES[self::BEFORE_ITEMS]['tmp_name'])
            ->destinationDir($this->getDriverImageDirPath())
            ->generateUniqueName($_FILES[self::BEFORE_ITEMS]['name'])
            ->mapGeneratedName($beforeItemsGeneratedName)
            ->compressQuality(75)
            ->save();
        if(!$isBeforeItemsImageSaved){
            $this->killAsFailure([
                "failed_to_save_before_items_image"=> true
            ]);
        }

        $afterItemsGeneratedName = "";
        $isAfterItemsImageSaved = ImageUploader::withSrc($_FILES[self::AFTER_ITEMS]['tmp_name'])
            ->destinationDir($this->getDriverImageDirPath())
            ->generateUniqueName($_FILES[self::AFTER_ITEMS]['name'])
            ->mapGeneratedName($afterItemsGeneratedName)
            ->compressQuality(75)
            ->save();
        if(!$isAfterItemsImageSaved){
            $this->killAsFailure([
                "failed_to_save_after_items_image"=> true
            ]);
        }

        $registration_time = Carbon::now();

        $Delivery = new ConfirmDeliveryEntity(
            Uuid::uuid4()->toString(),
            $_POST[self::DELIVERY_ID],
            $_POST[self::CUSTOMER_ID],
            $_POST[self::DRIVER_ID],
            $_POST[self::LOCATION],
            $numberPlateGeneratedName,
            $facePictureGeneratedName,
            $beforeItemsGeneratedName,
            $afterItemsGeneratedName,
            0,
            $registration_time,
            $registration_time,
            false
        );

        $Delivery = $this->getAppDB()->getConfirmDeliveryDao()->insertConfirmDelivery($Delivery);

        if($Delivery === null){
            $this->killAsFailure([
                "failed_to_make_confirm_delivery_request" => true
            ]);
        }

        $this->resSendOK([
            'confirm_delivery_success'=>[
                ConfirmDeliveryTableSchema::ID => $Delivery->getId(),
                ConfirmDeliveryTableSchema::DELIVERY_ID => $Delivery->getDeliveryId(),
                ConfirmDeliveryTableSchema::CUSTOMER_ID => $Delivery->getCustomerId(),
                ConfirmDeliveryTableSchema::DRIVER_ID => $Delivery->getDriverId(),
                ConfirmDeliveryTableSchema::LOCATION => $Delivery->getLocation(),
                ConfirmDeliveryTableSchema::NUMBER_PLATE => $this->createLinkForDriverImage($Delivery->getNumberPlate()),
                ConfirmDeliveryTableSchema::FACE => $this->createLinkForDriverImage($Delivery->getFace()),
                ConfirmDeliveryTableSchema::BEFORE_ITEMS => $this->createLinkForDriverImage($Delivery->getBeforeItems()),
                ConfirmDeliveryTableSchema::AFTER_ITEMS => $this->createLinkForDriverImage($Delivery->getAfterItems()),
                ConfirmDeliveryTableSchema::CONFIRMED => $Delivery->getConfirmed(),
                ConfirmDeliveryTableSchema::STATUS => $Delivery->isStatus(),
                ConfirmDeliveryTableSchema::CREATED_AT => $Delivery->getCreatedAt(),
                ConfirmDeliveryTableSchema::UPDATED_AT => $Delivery->getUpdatedAt()
            ]
        ]);
    }
}

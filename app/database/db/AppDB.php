<?php

class AppDB {
    const HOSTNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DATABASE = "ifast";

    private mysqli $conn;

    private AdsDao $adsDao;
    private ConfirmDeliveryDao $confirmDeliveryDao;
    private DelieveryDao $delieveryDao;
    private DeliveryBillDao $deliveryBillDao;
    private DriverConversationDao $driverConversationDao;
    private DriverDao $driverDao;
    private DriverPartnerDao $driverPartnerDao;
    private DriverStatisticsDao $driverStatisticsDao;
    private DriverWalletDao $driverWalletDao;
    private DriverWithdrawlDao $driverWithdrawlDao;
    private Driver_notificationDao $driver_notificationDao;
    private RegisterCustomerDao $registerCustomerDao;

    function __construct() {
        $temp_conn = mysqli_connect(self::HOSTNAME, self::USERNAME, self::PASSWORD, self::DATABASE);

        if (!$temp_conn) {
            die("Couldn't Connect to DB!");
        }

        $this->conn = $temp_conn;

        mysqli_query($this->conn, (new AdsTableSchema())->getBlueprint()); // Creates Ads Table
        $this->adsDao = new AdsDao($this->conn); // Initialize Ads Dao

        mysqli_query($this->conn, (new ConfirmDeliveryTableSchema())->getBlueprint()); // Creates ConfirmDelivery Table
        $this->confirmDeliveryDao = new ConfirmDeliveryDao($this->conn); // Initialize ConfirmDelivery Dao

        mysqli_query($this->conn, (new DelieveryTableSchema())->getBlueprint()); // Creates Delievery Table
        $this->delieveryDao = new DelieveryDao($this->conn); // Initialize Delievery Dao

        mysqli_query($this->conn, (new DeliveryBillTableSchema())->getBlueprint()); // Creates DeliveryBill Table
        $this->deliveryBillDao = new DeliveryBillDao($this->conn); // Initialize DeliveryBill Dao

        mysqli_query($this->conn, (new DriverConversationTableSchema())->getBlueprint()); // Creates DriverConversation Table
        $this->driverConversationDao = new DriverConversationDao($this->conn); // Initialize DriverConversation Dao

        mysqli_query($this->conn, (new DriverTableSchema())->getBlueprint()); // Creates Driver Table
        $this->driverDao = new DriverDao($this->conn); // Initialize Driver Dao

        mysqli_query($this->conn, (new DriverPartnerTableSchema())->getBlueprint()); // Creates DriverPartner Table
        $this->driverPartnerDao = new DriverPartnerDao($this->conn); // Initialize DriverPartner Dao

        mysqli_query($this->conn, (new DriverStatisticsTableSchema())->getBlueprint()); // Creates DriverStatistics Table
        $this->driverStatisticsDao = new DriverStatisticsDao($this->conn); // Initialize DriverStatistics Dao

        mysqli_query($this->conn, (new DriverWalletTableSchema())->getBlueprint()); // Creates DriverWallet Table
        $this->driverWalletDao = new DriverWalletDao($this->conn); // Initialize DriverWallet Dao

        mysqli_query($this->conn, (new DriverWithdrawlTableSchema())->getBlueprint()); // Creates DriverWithdrawl Table
        $this->driverWithdrawlDao = new DriverWithdrawlDao($this->conn); // Initialize DriverWithdrawl Dao

        mysqli_query($this->conn, (new Driver_notificationTableSchema())->getBlueprint()); // Creates Driver_notification Table
        $this->driver_notificationDao = new Driver_notificationDao($this->conn); // Initialize Driver_notification Dao

        mysqli_query($this->conn, (new RegisterCustomerTableSchema())->getBlueprint()); // Creates RegisterCustomer Table
        $this->registerCustomerDao = new RegisterCustomerDao($this->conn); // Initialize RegisterCustomer Dao

    }

    public function getConnection(): mysqli {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }

    public function getAdsDao(): AdsDao {
        return $this->adsDao;
    }

    public function getConfirmDeliveryDao(): ConfirmDeliveryDao {
        return $this->confirmDeliveryDao;
    }

    public function getDelieveryDao(): DelieveryDao {
        return $this->delieveryDao;
    }

    public function getDeliveryBillDao(): DeliveryBillDao {
        return $this->deliveryBillDao;
    }

    public function getDriverConversationDao(): DriverConversationDao {
        return $this->driverConversationDao;
    }

    public function getDriverDao(): DriverDao {
        return $this->driverDao;
    }

    public function getDriverPartnerDao(): DriverPartnerDao {
        return $this->driverPartnerDao;
    }

    public function getDriverStatisticsDao(): DriverStatisticsDao {
        return $this->driverStatisticsDao;
    }

    public function getDriverWalletDao(): DriverWalletDao {
        return $this->driverWalletDao;
    }

    public function getDriverWithdrawlDao(): DriverWithdrawlDao {
        return $this->driverWithdrawlDao;
    }

    public function getDriver_notificationDao(): Driver_notificationDao {
        return $this->driver_notificationDao;
    }

    public function getRegisterCustomerDao(): RegisterCustomerDao {
        return $this->registerCustomerDao;
    }
}


<?php

class Manifest {
    const API_KEY = "ifast is secured now.";
    const DEBUG_MODE = true;
    const MAINTENANCE_MODE = false;
    const FCM_SERVER_API_KEY = "TODO: Please Add FCM KEY";

    private const COMPOSER_VENDOR = [
        'dir_path' => '../',
        'vendor' => [
            'autoload'
        ]
    ];

    private const LIBS = [
        'dir_path' => './libs',
        'magician' => [
            MagicianSpell::class,
            MagicianPasswordSpell::class,
            Magician::class,
        ],
        'query_builder' => [
            QueryType::class,
            Query::class,
            InsertQuery::class,
            WhereApplicableQuery::class,
            SelectQuery::class,
            UpdateQuery::class,
            DeleteQuery::class,
            QueryBuilder::class,
        ],
        'db_libs' => [
            TableDao::class,
            TableSchema::class,
        ],
    ];

    private const DATABASE = [
        'dir_path' => './database',
        'entities' => [
            AdsEntity::class,
            ConfirmDeliveryEntity::class,
            DelieveryEntity::class,
            DriverEntity::class,
        ],
        'schema' => [
            AdsTableSchema::class,
            ConfirmDeliveryTableSchema::class,
            DelieveryTableSchema::class,
            DriverTableSchema::class,
        ],
        'factories' => [
            AdsFactory::class,
            ConfirmDeliveryFactory::class,
            DelieveryFactory::class,
            DriverFactory::class,
        ],
        'dao' => [
            AdsDao::class,
            ConfirmDeliveryDao::class,
            DelieveryDao::class,
            DriverDao::class,
        ],
        'db' => [
            AppDB::class
        ],
    ];

    private const CORE = [
        'dir_path' => './',
        'core' => [
            Environment::class,
            ElectroResponse::class,
            ElectroApi::class,
        ],
    ];

    private const UTILS = [
        'dir_path' => './utils',
        'image_uploader' => [
            ImageUploader::class,
        ],
    ];

    private const MODELS = [
        'dir_path' => './',
        'models' => [
        ]
    ];

    private const AGENTS = [
        'dir_path' => './',
        'agents' => [
            AcceptDeliveryRequest::class,
            ConfirmDeliveryRequest::class,
            DeleteAccountDriver::class,
            DeletePostedAds::class,
            EmailVerifyDriver::class,
            LoginDriver::class,
            MakeDeliveryCustomer::class,
            PostAnAds::class,
            PostedAds::class,
            RegisterDriver::class,
            RejectDeliveryRequest::class,
            ShowDeliveryRequests::class,
            UpdatePostAdStatus::class,
        ]
    ];

    public static function getAppSystemRoot(): string {
        return substr(self::devisePath('../'), 0, -1);
    }

    public static function devisePath($path): string {
        $root_path = explode('/', __DIR__);

        if (substr($path, 0, 2) === './') {
            $path = substr($path, 2);
        } else {
            while (substr($path, 0, 3) === '../') {
                $path = substr($path, 3);
                array_pop($root_path);
            }
        }

        return implode('/', $root_path) . '/' . $path;
    }

    private function requireItems(array $package) {
        foreach ($package as $key => $value) {
            if ($key !== 'dir_path') {
                foreach ($value as $module) {
                    $dir_path = $package['dir_path'];
                    $path = $dir_path;
                    if ($dir_path !== './' && $dir_path !== '../') {
                        $path = $path . '/';
                    }
                    $path = $path . $key . '/' . $module . '.php';
                    require self::devisePath($path) . '';
                }
            }
        }
    }

    private function loadRequirements() {
        self::requireItems(self::COMPOSER_VENDOR);
        self::requireItems(self::LIBS);
        self::requireItems(self::DATABASE);
        self::requireItems(self::CORE);
        self::requireItems(self::UTILS);
        self::requireItems(self::MODELS);
        self::requireItems(self::AGENTS);
    }

    private function __construct() {
        $this->loadRequirements();
    }

    public static function create() {
        new Manifest();
    }
}

Manifest::create();

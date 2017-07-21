<?php

namespace grptx\Firebase;

use Kreait\Firebase\Database;
use Kreait\Firebase\Database\Reference;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Exception\ServiceAccountDiscoveryFailed;
use yii\base\Component;

class Firebase extends Component
{
    /**
     * @var string
     */
    public $credential_file;
    /**
     * @var string
     */
    public $database_uri = false;
    /**
     * @var ServiceAccount
     */
    private $_serviceAccount;
    /**
     * @var \Kreait\Firebase
     */
    private $_firebase;
    /**
     * @var Database
     */
    private $_database;

    /**
     * @return ServiceAccount
     */
    public function getServiceAccount(): ServiceAccount
    {
        if (!$this->_serviceAccount) {
            try {
                if (!$this->credential_file) {
                    $this->_serviceAccount = ServiceAccount::discover();
                } else {
                    $this->_serviceAccount = ServiceAccount::fromJsonFile($this->credential_file);
                }
            } catch (ServiceAccountDiscoveryFailed $e) {
                $this->_serviceAccount = null;
            }

        }
        return $this->_serviceAccount;
    }

    /**
     * @return string
     */
    public function getDataBaseUri(): string
    {
        return $this->database_uri;
    }

    /**
     * @return \Kreait\Firebase
     */
    public function getFirebase(): \Kreait\Firebase
    {
        if (!$this->_firebase) {
            if ($this->getServiceAccount()) {
                $factory = (new Factory)->withServiceAccount($this->getServiceAccount());
                if ($this->getDataBaseUri()) {
                    $this->_firebase = $factory->withDatabaseUri($this->getDataBaseUri())->create();
                } else {
                    $this->_firebase = (new Factory)->withServiceAccount($this->getServiceAccount())->create();
                }
            } else if ($this->getDataBaseUri()) {
                $this->_firebase = (new Factory)->withDatabaseUri($this->getDataBaseUri())->create();
            } else {
                throw new ServiceAccountDiscoveryFailed("cannot retrieve Firebase istance");
            }
        }
        return $this->_firebase;
    }

    /**
     * @return Database
     */
    public function getDatabase(): Database
    {
        if (!$this->_database) {
            if ($this->getFirebase()) {
                $this->_database = $this->getFirebase()->getDatabase();
            }
        }
        return $this->_database;
    }

    /**
     * @param string $path
     * @return Reference
     */
    public function getReference(string $path = ''): Reference
    {
        return $this->getDatabase()->getReference($path);
    }

    /**
     * @param $uri
     * @return Reference
     */
    public function getReferenceFromUrl($uri): Reference
    {
        return $this->getDatabase()->getReferenceFromUrl($uri);
    }

}
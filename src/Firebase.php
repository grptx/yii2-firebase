<?php
/**
 * Created by PhpStorm.
 * User: gx
 * Date: 20/07/17
 * Time: 16.30
 */

namespace grptx\Firebase;

use Kreait\Firebase\Database;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use yii\base\Component;

class Firebase extends Component {
    /**
     * @var string
     */
    public $credential_file;
    /**
     * @var string
     */
    public $database_uri;
    /**
     * @var ServiceAccount
     */
    private $_serviceAccount;
    /**
     * @var string
     */
    private $_dataBaseUri;
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
    public function getServiceAccount()
    {
        if(!$this->_serviceAccount) {
            if(!$this->credential_file) {
                $this->_serviceAccount = ServiceAccount::discover();
            } else {
                $this->_serviceAccount = ServiceAccount::fromJsonFile($this->credential_file);
            }
        }
        return $this->_serviceAccount;
    }

    /**
     * @return string
     */
    public function getDataBaseUri()
    {
        return $this->_dataBaseUri;
    }

    /**
     * @return \Kreait\Firebase
     */
    public function getFirebase()
    {
        if(!$this->_firebase){
            if($this->getDataBaseUri()) {
                $this->_firebase = (new Factory)->withDatabaseUri($this->getDataBaseUri())->create();
            } else if($this->getServiceAccount()) {
                $this->_firebase = (new Factory)->withServiceAccount($this->getServiceAccount())->create();
            }
        }
        return $this->_firebase;
    }

    /**
     * @return Database
     */
    public function getDatabase()
    {
        if(!$this->_database) {
            if($this->getFirebase()) {
                $this->_database = $this->getFirebase()->getDatabase();
            }
        }
        return $this->_database;
    }


}
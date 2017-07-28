<?php
/**
 * Created by PhpStorm.
 * User: gx
 * Date: 28/07/17
 * Time: 10.53
 */

namespace grptx\tests;

use Kreait\Firebase\ServiceAccount;
use Kreait\Tests\FirebaseTestCase;
use Firebase\Auth\Token\Handler;
use GuzzleHttp\Psr7\Uri;
use Kreait\Firebase;
use PHPUnit\Framework\TestCase;

class FirebaseTest extends \grptx\Firebase\Firebase {
	private $firebaseTestCase;

	/**
	 * @var ServiceAccount|\PHPUnit_Framework_MockObject_MockObject
	 */
	private $serviceAccount;

	/**
	 * @var Uri
	 */
	private $databaseUri;

	/**
	 * @var Handler
	 */
	private $tokenHandler;

	/**
	 * @var Firebase
	 */
	private $firebase;

	protected function setUp() {
		$this->firebaseTestCase = new FirebaseYiiTestCase();
		$this->serviceAccount   = $this->firebaseTestCase->createServiceAccountMock();
		$this->databaseUri      = new Uri( 'https://database-uri.tld' );
		$this->tokenHandler     = new Handler( 'projectid', 'clientEmail', 'privateKey' );

		$this->firebase = new Firebase( $this->serviceAccount, $this->databaseUri, $this->tokenHandler );
	}

	/**
	 * Firebase constructor.
	 */
	public function __construct() {
		parent::__construct([]);
		$this->setUp();
	}

	public function getServiceAccount(): ServiceAccount
	{
		return $this->serviceAccount;
	}
}

class FirebaseYiiTestCase extends TestCase {
	protected $fixturesDir = __DIR__.'/_fixtures';

	/**
	 * @return ServiceAccount|\PHPUnit_Framework_MockObject_MockObject
	 */
	public function createServiceAccountMock()
	{
		$mock = $this->createMock(ServiceAccount::class);

		$mock->expects($this->any())
		     ->method('getProjectId')
		     ->willReturn('project');

		$mock->expects($this->any())
		     ->method('getClientId')
		     ->willReturn('client');

		$mock->expects($this->any())
		     ->method('getClientEmail')
		     ->willReturn('client@email.tld');

		$mock->expects($this->any())
		     ->method('getPrivateKey')
		     ->willReturn('some private key');

		return $mock;
	}
}
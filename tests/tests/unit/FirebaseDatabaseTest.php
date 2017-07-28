<?php


class FirebaseDatabaseTest extends \Codeception\Test\Unit {
	/**
	 * @var \UnitTester
	 */
	protected $tester;


	protected function _before() {
	}

	protected function _after() {
	}

	// tests
	public function testRetrieveDb() {
		$database = \Yii::$app->firebase->getDatabase();

		expect_that( $database instanceof \Kreait\Firebase\Database );

	}

	public function testGetReference() {
		$reference = \Yii::$app->firebase->getReference( 'node/path' );

		expect_that( $reference instanceof \Kreait\Firebase\Database\Reference );
	}

}
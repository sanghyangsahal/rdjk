<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PHPStamp\Templator;
use PHPStamp\Document\WordDocument;

class Phpstamp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		

	}
	public function index()
	{
		$cachePath = 'uploads/';
		$templator = new Templator($cachePath);

		$documentPath = 'resources/templates/template.docx';
		$document = new WordDocument($documentPath);

		$values = array(
				        'library' => 'PHPStamp 0.1',
				        'simpleValue' => 'I am simple value',
				        'nested' => array(
				            'firstValue' => 'First child value',
				            'secondValue' => 'Second child value'
				        ),
				        'header' => 'test of a table row',
				        'students' => array(
				            array('id' => 1, 'name' => 'Student 1', 'mark' => '10'),
				            array('id' => 2, 'name' => 'Student 2', 'mark' => '4'),
				            array('id' => 3, 'name' => 'Student 3', 'mark' => '7')
				        ),
				        'maxMark' => 10,
				        'todo' => array(
				            'TODO 1',
				            'TODO 2',
				            'TODO 3'
				        )
						);
		$result = $templator->render($document, $values);
		$result->download();
	}

}

/* End of file phpstamp.php */
/* Location: ./application/controllers/phpstamp.php */
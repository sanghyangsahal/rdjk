<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  (APPPATH.'third_party/autoload.php');
use PhpOffice\PhpWord\Settings;
//Autoloader::register();
date_default_timezone_set('UTC');
error_reporting(E_ALL);
define('CLI', (PHP_SAPI == 'cli') ? true : false);
define('EOL', CLI ? PHP_EOL : '<br />');
define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
define('IS_INDEX', SCRIPT_FILENAME == 'index');
Settings::loadConfig();

class CreateWordDoc{
    public function __construct(){
    }

    public function createWordDoc($templateSrc,$destination,$arrayValue=array()){
		
		$phpWord = new \PhpOffice\PhpWord\TemplateProcessor($templateSrc);
		
		foreach ($arrayValue as $key => $value) {
			$phpWord->setValue($key, $value);
		}
		$phpWord->saveAs($destination);
	}

	public function createWordDocWithTable($templateSrc,$destination,$arrayValue=array(),$arrayTable=array()){
		$phpWord = new \PhpOffice\PhpWord\TemplateProcessor($templateSrc);
		foreach ($arrayValue as $key => $value) {
			$phpWord->setValue($key, $value);
		}
		if(!empty($arrayTable)){
			$phpWord->cloneRow('no', count($arrayTable));
			if(count($arrayTable)>0){
				$i=1;
				foreach ($arrayTable as $key => $value) {
					foreach ($value as $k => $val) {
						$phpWord->setValue($k.'#'.$i, $val);
					}
					$i++;
				}
			}
		}
		$phpWord->saveAs($destination);
	}

	public function downloadWordDoc($source,$output,$isDelete=FALSE){
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.$output);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($source));
		flush();
		readfile($source);
		if($isDelete)
			unlink($source);
		exit;
	}

	public function convertWordToPdf($sourceFile,$destinationFile){
		echo exec('python /var/www/html/sikep-app/application/libraries/python-handler.py '.$sourceFile.' '.$destinationFile.' 2>&1', $output);
	}

	public function terbilang($x){
		if($x=='-')
			return $x;
		if ($x=='' OR $x==0){
			$x='';
		}
		$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
			if ($x < 12)
				return " " . $abil[$x];
			elseif ($x < 20)
    			return $this->Terbilang($x - 10) . "belas";
    		elseif ($x < 100)
    			return $this->Terbilang($x / 10) . " puluh" .$this->Terbilang($x % 10);
    		elseif ($x < 200)
    			return " seratus" .$this->Terbilang($x - 100);
    		elseif ($x < 1000)
    			return $this->Terbilang($x / 100) . " ratus" .$this->Terbilang($x % 100);
    		elseif ($x < 2000)
    			return " seribu" .$this->Terbilang($x - 1000);
    		elseif ($x < 1000000)
    			return $this->Terbilang($x / 1000) . " ribu" .$this->Terbilang($x % 1000);
    		elseif ($x < 1000000000)
    			return $this->Terbilang($x / 1000000) . " juta" .$this->Terbilang($x % 1000000);
	}
}
?>
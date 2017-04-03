<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once (APPPATH.'third_party/autoload.php');
use PhpOffice\PhpWord\Settings;
date_default_timezone_set('UTC');
error_reporting(E_ALL);
define('CLI', (PHP_SAPI == 'cli') ? true : false);
define('EOL', CLI ? PHP_EOL : '<br />');
define('SCRIPT_FILENAME', basename($_SERVER['SCRIPT_FILENAME'], '.php'));
define('IS_INDEX', SCRIPT_FILENAME == 'index');

Settings::loadConfig();

class Phpword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Set writers
        $writers = array('Word2007' => 'docx', 'ODText' => 'odt', 'RTF' => 'rtf', 'HTML' => 'html', 'PDF' => 'pdf');

        // Set PDF renderer
        if (null === Settings::getPdfRendererPath()) {
            $writers['PDF'] = null;
        }

        // Turn output escaping on
        Settings::setOutputEscapingEnabled(true);

        // Return to the caller script when runs by CLI
        if (CLI) {
            return;
        }

        // Set titles and names
        $pageHeading = str_replace('_', ' ', SCRIPT_FILENAME);
        $pageTitle = IS_INDEX ? 'Welcome to ' : "{$pageHeading} - ";
        $pageTitle .= 'PHPWord';
        $pageHeading = IS_INDEX ? '' : "<h1>{$pageHeading}</h1>";

        // Populate samples
        $files = '';
        if ($handle = opendir('.')) {
            while (false !== ($file = readdir($handle))) {
                if (preg_match('/^Sample_\d+_/', $file)) {
                    $name = str_replace('_', ' ', preg_replace('/(Sample_|\.php)/', '', $file));
                    $files .= "<li><a href='{$file}'>{$name}</a></li>";
                }
            }
            closedir($handle);
        }
    }

    function index()
    {
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        // Adding Text element to the Section having font styled by default...
        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
        );

        /*
         * Note: it's possible to customize font style of the Text element you add in three ways:
         * - inline;
         * - using named font style (new font style object will be implicitly created);
         * - using explicitly created font style object.
         */

        // Adding Text element with font customized inline...
        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
                . 'and is never the result of selfishness." '
                . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );

        // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
                . 'but in rising again after you fall." '
                . '(Vince Lombardi)',
            $fontStyleName
        );

        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('helloWorld.docx');

        // Saving the document as ODF file...
        /*$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
        $objWriter->save('helloWorld.odt');*/

        // Saving the document as HTML file...
        /*$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save('helloWorld.html');
*/
        /* Note: we skip RTF, because it's not XML-based and requires a different example. */
        /* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */
    }

    function getEndingNotes($writers)
    {
        $result = '';
        // Do not show execution time for index
        if (!IS_INDEX) {
            $result .= date('H:i:s') . " Done writing file(s)" . EOL;
            $result .= date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB" . EOL;
        }
        // Return
        if (CLI) {
            $result .= 'The results are stored in the "results" subdirectory.' . EOL;
        } else {
            if (!IS_INDEX) {
                $types = array_values($writers);
                $result .= '<p>&nbsp;</p>';
                $result .= '<p>Results: ';
                foreach ($types as $type) {
                    if (!is_null($type)) {
                        $resultFile = 'results/' . SCRIPT_FILENAME . '.' . $type;
                        if (file_exists($resultFile)) {
                            $result .= "<a href='{$resultFile}' class='btn btn-primary'>{$type}</a> ";
                        }
                    }
                }
                $result .= '</p>';
            }
        }
        return $result;
    }

    function template()
    {
        $id_rdjk = $this->uri->segment(3);
        //$id_rdjk = $this->input->post('id_rdjk');
        $this->load->model('model_rdjk','rdjk');
        $data = $this->rdjk->get_detail_rdjk($id_rdjk);
        foreach ($data as $row) {
            $arrayValue = array(
                'nama_kegiatan' => $row->nama_kegiatan,
                'tgl_mulai' => $row->tgl_mulai,
                'tgl_selesai' => $row->tgl_selesai,
                'nama_ruang' => $row->nama_ruang,
            );
        }
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('resources/templates/UNDANGAN.docx');

        //$templateProcessor->cloneBlock('CLONEME', 3);
        foreach ($arrayValue as $key => $value) {
            $templateProcessor->setValue($key, $value);
            $templateProcessor->setValue('tester','edited3');

        //$templateProcessor->setValue('nama_kegiatan', 'sahal');
        $templateProcessor->saveAs('uploads/hasil_'.$id_rdjk.'.docx');
        echo $this->getEndingNotes(array('Word2007' => 'docx'));
    }
    }
    function tester()
    {
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('resources/templates/UNDANGAN.docx');

        //$templateProcessor->cloneBlock('CLONEME', 3);
        foreach ($arrayValue as $key => $value) {
            $templateProcessor->setValue($key, $value);
            $templateProcessor->setValue('tester','edited3');

        //$templateProcessor->setValue('nama_kegiatan', 'sahal');
        $templateProcessor->saveAs('uploads/hasil_'.$id_rdjk.'.docx');
        echo $this->getEndingNotes(array('Word2007' => 'docx'));
    }

    }

}

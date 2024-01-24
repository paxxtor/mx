<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/PhpOffice/PhpWord/Autoloader.php';
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class Word_generator {

    protected $CI;
    protected $phpWord;

    public function __construct() {
        $this->CI =& get_instance();
        \PhpOffice\PhpWord\Autoloader::register();
        $this->phpWord = new PhpWord();
    }

    public function readAndWriteWord() {
        // Ruta del archivo de entrada (ajusta la ruta según tus necesidades)
        $inputFilePath = APPPATH . 'path/to/input/file.docx';

        // Ruta del archivo de salida (ajusta la ruta según tus necesidades)
        $outputFilePath = 'helloWorld.docx';

        // Crear un nuevo documento y agregar el contenido
        $phpWord = new PhpWord();
      
        $section = $phpWord->addSection();
       
        /*
        * Note: it's possible to customize font style of the Text element you add in three ways:
        * - inline;
        * - using named font style (new font style object will be implicitly created);
        * - using explicitly created font style object.
        */

       
        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($outputFilePath);

        // Descargar el documento
        // Prepare headers for download
        $this->CI->load->helper('download');
        $data = file_get_contents($outputFilePath);
        $filename = 'helloWorld.docx'; // Change this to the desired filename

        // Force download the file
        force_download($filename, $data);
     
        return "Lectura y escritura completadas exitosamente.";
    }

    public function WriteWord($content,  $filename ) {
       
        // Create a new document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
       
        // Adding Text element with font customized using explicitly created font style object...
    
        $myTextElement = $section->addText($content);
        $myTextElement->setFontStyle($fontStyle);

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($file);

        // Descargar el documento
        // Prepare headers for download
        $this->CI->load->helper('download');
        $data = file_get_contents($file);

        // Force download the file
        force_download($filename, $data);
   
    }


    public function HtmltoWord( $html, $filename ) {
       
       log_message('error',$html);
        // Create a new document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
       
        // Adding Text element with font customized using explicitly created font style object...

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);
        
        // Save the document
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($filename);
        
        // Descargar el documento
        // Prepare headers for download
        $this->CI->load->helper('download');
        $data = file_get_contents($filename);

        // Force download the file
        force_download($filename, $data);
       
    }


    
    public function HtmltoWord2( $html, $filename ) {
       
       
        // Create a new document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
       
        // Adding Text element with font customized using explicitly created font style object...

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);
        
        // Save the document
        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($filename);
       
        return $html;
       
    }




}

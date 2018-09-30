<?php
/**
 * Very simple FileOutputPrinter for BehatHTMLFormatter
 * @author David Raison <david@tentwentyfour.lu>
 */

namespace emuse\BehatHTMLFormatter\Printer;

use Behat\Testwork\Output\Exception\BadOutputPathException;
use Behat\Testwork\Output\Printer\OutputPrinter as PrinterInterface;


class FileOutputPrinter implements PrinterInterface {

  /**
   * @param  $outputPath where to save the generated report file
   */
  private $outputPath;

  /**
   * @param  $base_path Behat base path
   */
  private $base_path;

  /**
   * @param  $rendererFiles List of the filenames for the renderers
   */
  private $rendererFiles;

  /**
   * @param $rendererList
   * @param $filename
   * @param $base_path
   */
  public function __construct($rendererList, $filename, $base_path) {
    //let's generate the filenames for the renderers
    $this->rendererFiles = array();
    $date = date('d.m.Y_H:i:s');
    foreach ($rendererList as $renderer) {
		$this->setScreenShotName($date);
      if ($filename == 'generated') {
		//\BrowserHelper::setCurrentScreenShotName( '[' . $_SERVER['argv'][2] . ']' . $date);
        $this->rendererFiles[$renderer] = $this->formatHtmlFilename($date);
      }
      else{
		 // \BrowserHelper::setCurrentScreenShotName( '[' . $_SERVER['argv'][2] . ']' . $date);
          $this->rendererFiles[$renderer] = $this->formatHtmlFilename($filename);
      }
    }

    $this->base_path = $base_path;
  }

	private function setScreenShotName($postFix)
	{
		$setupPhp = \BrowserHelper::getSetupPhpFile();
		// -s SuitName - имя сюита ожидаем всегда последним!
		$copyServer = $_SERVER['argv'];
		$suiteName  = end($copyServer);

		\BrowserHelper::setCurrentScreenShotName( '[' . $suiteName . ']' . $postFix);

	}

	/**
	 * @param string $postFix
	 *
	 * @return string
	 */
  private function formatHtmlFilename($postFix)
  {
	  $setupPhp 	= \BrowserHelper::getSetupPhpFile();
	  // -s SuitName - имя сюита ожидаем всегда последним!
	  $copyServer 	= $_SERVER['argv'];
	  $suiteName 	= end($copyServer);

	  //if($setupPhp)
	  //{
		//  return \BrowserHelper::getCurrentBrowser() . '[' . $suiteName . ']' . $postFix;
	  //}

	  return \BrowserHelper::getCurrentBrowser() . '[' . $suiteName . ']' . $postFix;
  }

  /**
   * Verify that the specified output path exists or can be created,
   * then sets the output path.
   *
   * @param String $path Output path relative to %paths.base%
   *
   */
  public function setOutputPath($path) {
    $outpath = $path;
    if (!file_exists($outpath)) {
      if (!mkdir($outpath, 0755, TRUE)) {
        throw new BadOutputPathException(
          sprintf(
            'Output path %s does not exist and could not be created!',
            $outpath
          ),
          $outpath
        );
      }
    }
    else {
      if (!is_dir(realpath($outpath))) {
        throw new BadOutputPathException(
          sprintf(
            'The argument to `output` is expected to the a directory, but got %s!',
            $outpath
          ),
          $outpath
        );
      }
    }
    $this->outputPath = $outpath;
  }

  /**
   * Returns output path
   *
   * @return String output path
   */
  public function getOutputPath() {
    return $this->outputPath;
  }

  /**
   * Sets output styles.
   *
   * @param array $styles
   */
  public function setOutputStyles(array $styles) {

  }

  /**
   * Returns output styles.
   *
   * @return array
   */
  public function getOutputStyles() {

  }

  /**
   * Forces output to be decorated.
   *
   * @param Boolean $decorated
   */
  public function setOutputDecorated($decorated) {

  }

  /**
   * Returns output decoration status.
   *
   * @return null|Boolean
   */
  public function isOutputDecorated() {
    return TRUE;
  }

  /**
   * Sets output verbosity level.
   *
   * @param integer $level
   */
  public function setOutputVerbosity($level) {

  }

  /**
   * Returns output verbosity level.
   *
   * @return integer
   */
  public function getOutputVerbosity() {

  }

  /**
   * Writes message(s) to output console.
   *
   * @param string|array $messages message or array of messages
   */
  public function write($messages = array()) {
    //Write it for each message = each renderer
    foreach ($messages as $key => $message) {
      $file = $this->outputPath . DIRECTORY_SEPARATOR . $this->rendererFiles[$key] . '.html';
      file_put_contents($file, $message);
      $this->copyAssets($key);
    }
  }


  /**
   * Writes newlined message(s) to output console.
   *
   * @param string|array $messages message or array of messages
   */
  public function writeln($messages = array()) {
    //Write it for each message = each renderer
    foreach ($messages as $key => $message) {
      $file = $this->outputPath . DIRECTORY_SEPARATOR . $this->rendererFiles[$key] . '.html';
      file_put_contents($file, $message, FILE_APPEND);
    }
  }

  /**
   * Writes  message(s) at start of the output console.
   *
   * @param string|array $messages message or array of messages
   */
  public function writeBeginning($messages = array()) {

    //Write it for each message = each renderer
    foreach ($messages as $key => $message) {
      $file = $this->outputPath . DIRECTORY_SEPARATOR . $this->rendererFiles[$key] . '.html';
      $fileContents = file_get_contents($file);
      file_put_contents($file, $message . $fileContents);
    }
  }

  /**
   * Copies the assets folder to the report destination.
   *
   * @param string : the renderer
   */
  public function copyAssets($renderer) {
    // If the assets folder doesn' exist in the output path for this renderer, copy it
    $source = realpath(dirname(__FILE__));
    $assets_source = realpath($source . '/../../assets/' . $renderer);
    if ($assets_source === FALSE) {
      //There is no assets to copy for this renderer
      return;
    }

    //first create the assets dir
    $destination = $this->outputPath . DIRECTORY_SEPARATOR . 'assets';
    @mkdir($destination);

    $this->recurse_copy($assets_source, $destination . DIRECTORY_SEPARATOR . $renderer);
  }

  /**
   * Recursivly copy a path.
   * @param $src
   * @param $dst
   */
  private function recurse_copy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while (FALSE !== ($file = readdir($dir))) {
      if (($file != '.') && ($file != '..')) {
        if (is_dir($src . '/' . $file)) {
          $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
        }
        else {
          copy($src . '/' . $file, $dst . '/' . $file);
        }
      }
    }
    closedir($dir);
  }

  /**
   * Clear output console, so on next write formatter will need to init (create) it again.
   */
  public function flush() {

  }
}

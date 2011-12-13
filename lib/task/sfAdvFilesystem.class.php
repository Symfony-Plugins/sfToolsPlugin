<?php

/**
 * The sfAdvFilesystem class extends functionalities of the original sfFileSystem
 * class with several useful fonctions.
 *
 * @author  COil
 * @since   V5.1 - 3 aug 2011
 */
class sfAdvFilesystem extends sfFilesystem
{
  /**
   * Clear the content of a directory. Recursive or not. Allow to use a safe
   * key in order to forbid deletion that could be dangerous.
   * 
   * @param  String $sDirectory Directory to clear
   * @param  String $sSafeKey   Safe key   ex: '/tmp/'
   * @param  String $bIsRec     If the deletion is recursive
   * @return Mixed
   */
  public function clearDir($sDirectory, $sSafeKey = null, $bIsRec = false)
  {
    $aRemoved = array();

    // Windows
    if ('\\' == DIRECTORY_SEPARATOR)
    {
      $sDirectory = str_replace('\\', '/', $sDirectory);
    }

    // Test dir
    if (!is_dir($sDirectory))
    {
      return false;
    }

    // Test a directory pattern to be sure we don't delete important files
    if ((!is_null($sSafeKey)) && !(false === strpos($sSafeKey, $sDirectory)))
    {
      return false;
    }

    $aFiles = glob($sDirectory. DIRECTORY_SEPARATOR. '*');

    foreach ($aFiles as $aFile)
    {
      if (is_file($aFile))
      {
        $this->remove($aFile);
        $aRemoved[] = $aFile;
      }

      if ($bIsRec == true)
      {
        if (is_dir($aFile))
        {
          $this->clearDirRec($aFile, $sSafeKey);
          $this->remove($aFile);
          $aRemoved[] = $aFile;
        }
      }
    }

    return $aRemoved;
  }
  
  /**
   * Clear the content of a directory. Recursive version.
   *
   * @see clearDir
   */
  public function clearDirRec($sDirectory, $sSafeKey = '/temp')
  {
    return $this->clearDir($sDirectory, $sSafeKey, true);
  }

  /**
   * Copies a file. Same as the sfFilesystem function but return a boolean.
   *
   * @see sfFilesystem
   * 
   * @return Boolean
   */
  public function copy($originFile, $targetFile, $options = array())
  {
    if (!array_key_exists('override', $options))
    {
      $options['override'] = false;
    }

    // we create target_dir if needed
    if (!is_dir(dirname($targetFile)))
    {
      $this->mkdirs(dirname($targetFile));
    }

    $mostRecent = false;
    if (file_exists($targetFile))
    {
      $statTarget = stat($targetFile);
      $stat_origin = stat($originFile);
      $mostRecent = ($stat_origin['mtime'] > $statTarget['mtime']) ? true : false;
    }

    if ($options['override'] || !file_exists($targetFile) || $mostRecent)
    {
      $this->logSection('file+', $targetFile);

      return copy($originFile, $targetFile);
    }

    return true;
  }
}
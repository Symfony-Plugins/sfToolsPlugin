<?php

/**
 * Session storage handler to avoid the session loss problem with Flash.
 *
 * @see      http://oldforum.symfony-project.org/index.php/t/6849/
 * @example
 * swfu = new SWFUpload
 * ({
 *   upload_url : "<?php echo url_for("fileinfo/upload"); ?>?session_id=<?php echo session_id() ?>",
 * ...
 *
 * @internal This version was tested with symfony 1.4.15
 * @since    V1.0.2 - 9 nov 2011
 */
class sfFixflashSessionStorage extends sfSessionStorage
{
  public function initialize($options = null)
  {
    $session_id = sfContext::getInstance()->getRequest()->getParameter('session_id');
    
    if(!empty($session_id))
    {
      sfContext::getInstance()->getLogger()->info('- Forcing session_id for Flash: ' . $session_id);
      session_id($session_id);
    }

    parent::initialize($options);
  }
}
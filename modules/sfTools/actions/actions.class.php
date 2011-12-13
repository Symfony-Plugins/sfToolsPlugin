<?php

/**
 * home actions.
 *
 * @package    sfToolsPlugin
 * @subpackage home
 * @author     COil
 */
class sfToolsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $results = array_fill(1, 103, 1);
    $this->pager = new sfArrayPager();
    $this->pager->setResultArray($results);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
    
  }
}

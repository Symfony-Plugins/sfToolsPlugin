<?php

/**
 * Snippet by Scott Meves. Pager for a list of non ORM objects.
 *
 * @example:
 *    $myArrayOfThings = array('first', 'second', 'and so on');
 *    $this->pager = new myArrayPager(null, 15);
 *    $this->pager->setResultArray($myArrayOfThings);
 *    $this->pager->setPage($this->getRequestParameter('page',1));
 *    Ò$this->pager->init();
 *
 * @see http://snippets.symfony-project.org/snippet/177
 */
class sfArrayPager extends sfPager
{
  protected $resultsArray = null;

  public function __construct($class = null, $maxPerPage = 10)
  {
    parent::__construct($class, $maxPerPage);
  }

  public function init()
  {
    $this->setNbResults(count($this->resultsArray));

    if (($this->getPage() == 0 || $this->getMaxPerPage() == 0))
    {
     $this->setLastPage(0);
    }
    else
    {
     $this->setLastPage(ceil($this->getNbResults() / $this->getMaxPerPage()));
    }
  }

  public function setResultArray($array)
  {
    $this->resultsArray = $array;
  }

  public function getResultArray()
  {
    return $this->resultsArray;
  }

  public function retrieveObject($offset) {
    return $this->resultsArray[$offset];
  }

  public function getResults()
  {
    return array_slice($this->resultsArray, ($this->getPage() - 1) * $this->getMaxPerPage(), $this->maxPerPage);
  }
}
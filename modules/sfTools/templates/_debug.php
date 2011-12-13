<h3>::dump</h3>

<h4>sfDebugTools::dump($sf_user->getAttributeHolder(), '$sf_user->getAttributeHolder()', false);</h4>
<pre><?php sfDebugTools::dump($sf_user->getAttributeHolder()->getRawValue(), '$sf_user->getAttributeHolder()', false); ?></pre>

<h3>::dump2</h3>
<h4>sfDebugTools::dump2($sf_user->getAttributeHolder(), '$sf_user->getAttributeHolder()', false);</h4>
<pre><?php sfDebugTools::dump2($sf_user->getAttributeHolder()->getRawValue(), '$sf_user->getAttributeHolder()', false); ?></pre>


<h3>::getElapsedTime</h3>

<pre>
  $start = sfDebugTools::getMicroTimeNow();
  usleep(rand(1, 1000000));
  $end = sfDebugTools::getMicroTimeNow();
  sfDebugTools::dump(sfDebugTools::getElapsedTime($start, $end), 'sleep in seconds', false);
</pre>

<pre>
<?php
$start = sfDebugTools::getMicroTimeNow();
usleep(rand(1, 100000));
$end = sfDebugTools::getMicroTimeNow();
sfDebugTools::dump(sfDebugTools::getElapsedTime($start, $end), 'sleep in seconds', false);
?>
</pre>


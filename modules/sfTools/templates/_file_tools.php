<h3>::sanitizeFilename</h3>

<h4>echo sfFileTools::sanitizeFilename('--logö  _  __   ___   ora@@ñ--~gé--.gif');</h4>
<pre><?php echo sfFileTools::sanitizeFilename('--logö  _  __   ___   ora@@ñ--~gé--.gif'); ?></pre>


<h4>echo sfFileTools::sanitizeFilename('--LOgÖ  _  __   ___   ORA@@Ñ--~GË--.gif');</h4>
<pre><?php echo sfFileTools::sanitizeFilename('--LOgÖ  _  __   ___   ORA@@Ñ--~GË--.gif'); ?></pre>
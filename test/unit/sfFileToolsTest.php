<?php

/**
 * @author COil
 * @since  V1.0.1
 */

include_once(dirname(__FILE__). '/../../../../test/bootstrap/unit.php');
include_once(dirname(__FILE__). '/../../lib/utils/sfFileTools.class.php');

$t = new lime_test(18, new lime_output_color());

$t->is(sfFileTools::sanitizeFilename('--logö  _  __   ___   ora@@ñ--~gé--.gif'), 'logo_orange.gif', '::sanitizeFilename() handles complex filename with specials chars');
$t->is(sfFileTools::sanitizeFilename('--LOgÖ  _  __   ___   ORA@@Ñ--~GË--.gif'), 'logo_orange.gif', '::sanitizeFilename() lowerize the filename even with accents');
$t->is(sfFileTools::sanitizeFilename('SeNsiO'), 'sensio', '::sanitizeFilename() converts all characters to lower case');
$t->is(sfFileTools::sanitizeFilename('sensio labs'), 'sensiolabs', '::sanitizeFilename() removes a white space');
$t->is(sfFileTools::sanitizeFilename('sensio   labs'), 'sensiolabs', '::sanitizeFilename() removes  several white spaces');
$t->is(sfFileTools::sanitizeFilename('  sensio'), 'sensio', '::sanitizeFilename() removes spaces at the beginning of a string');
$t->is(sfFileTools::sanitizeFilename('sensio  '), 'sensio', '::sanitizeFilename() removes spaces at the end of a string');
$t->is(sfFileTools::sanitizeFilename('paris,france'), 'parisfrance', '::sanitizeFilename() removes non-ASCII characters');
$t->is(sfFileTools::sanitizeFilename('sen_sio  '), 'sen_sio', '::sanitizeFilename() keeps separators');
$t->is(sfFileTools::sanitizeFilename('sen______sio  '), 'sen_sio', '::sanitizeFilename() converts succeding separators');
$t->is(sfFileTools::sanitizeFilename('.gif'), '.gif', '::sanitizeFilename() handles file with only the extension');
$t->is(sfFileTools::sanitizeFilename('tO To.GiF'), 'toto.gif', '::sanitizeFilename() lowercase filename and extension');
$t->is(sfFileTools::sanitizeFilename('-__.gif'), '_.gif', '::sanitizeFilename() handles separator in start of file after a non-ASCII caracter');
$t->is(sfFileTools::sanitizeFilename('Copie de openoffice-org_openoffice.org_3.3.3_final_francais_10677.exe'), 'copiedeopenofficeorg_openoffice.org_3.3.3_final_francais_10677.exe', '::sanitizeFilename() another example');
$t->is(sfFileTools::sanitizeFilename('sfToolsPlugin.jpg'), 'sftoolsplugin.jpg', '::sanitizeFilename() another example');
$t->is(sfFileTools::sanitizeFilename('Copie de toto.jPeG'), 'copiedetoto.jpeg', '::sanitizeFilename() another example');
$t->is(sfFileTools::sanitizeFilename('logo_edition_1314352521.jpg'), 'logo_edition_1314352521.jpg', '::sanitizeFilename() file name returned if no modification was needed');
$t->is(sfFileTools::sanitizeFilename('fil€_system.jpg'), 'fileur_system.jpg', '::sanitizeFilename() converts the euro symbol');
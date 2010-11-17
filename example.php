<?php
include "./prototypeTemplate.php";

$str = 'Would you like to play a #{play} #{name}?' . "\n";

$entry = array
(
	'name' => 'freshteapot',
	'play' => 'game'
);


$template = new prototypeTemplate($str);

/* Display the Template with the variables swapped for what we want */
echo $template->evaluate($entry);

/* Print out a list of the keys */
print_r( $template->evaluateKeys(true) );

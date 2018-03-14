<?php
$infos = [
    'Firstname' => 'Nadia',
    'Lastname' => 'Mimtchioui',
    'address' => 'rue de Messancy 89',
    'PostalCode' => '6790',
    'City' => 'Aubange',
    'email' => 'luxo45@gmail.com',
    'Telephone' => '+352621614876',
    'Birthdate' => '1972-06-15'
];
$infosList = '<ul>';

foreach ($infos as $key => $value) {
    echo '<li>' . $key . '/ ' . $value . '</li>';
}

?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php

echo $infosList;
?>
	</body>
</html>
<?php
$date = '1972-06-15';
$dt = dateTime::createFromFormat(Y - M - d);
echo $dt->format('d-m-Y');
?>
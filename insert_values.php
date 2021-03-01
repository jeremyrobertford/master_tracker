<?php

function null_check($value) {

    //If input is empty return NULL for correct SQL query syntax
	if ($value == ' ' or $value == '') {
		return 'NULL';
	} else {
		return ltrim($value);
	}

}

function insert_values($table, $vars, $values) {

    //Create $conn connection to MySQL database
    include_once('connect_sql.php');

	$query = 'INSERT INTO master_tracker.' . $table . ' ';

    //Concatenate column names together and wrap columns with parantheses
	$cols = '(';
	foreach ($vars as $var) {
		$cols = $cols . $var . ', ';
	}
	$cols = rtrim($cols, ', ') . ') ';
	$query = $query . $cols;

    //Concatenate values together and wrap values with parantheses
	$query = $query.' VALUES (';
	$params = '';
	foreach ($values as $value) {
        $value = null_check($value);
		if ($value == 'NULL') {
			$params = $params.$value.', ';
		} elseif (is_string($value)) {
			$params = $params.'\''.$value.'\', ';
		}
	}
	$params = rtrim($params, ', ').');';
	$query = $query.$params;

    //Run query
	if ($conn->query($query) === TRUE) {
	  console.log('New record created successfully.');
	} else {
	  console.log('Error: ' . $query . '<br>' . $conn->error);
	}

    //Close connection to MySQL database
	$conn->close();
}

// EOF


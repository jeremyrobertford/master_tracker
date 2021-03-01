<?php

function choose_table() {

    //Create a new muscle
	if ($_POST['table'] == 'muscle') {
		$vars = array(
		);
		$values = array(
		);
		insert_values($_POST['table'], $vars, $values);

    //Connect an exercise to the muscles it uses
	} elseif ($_POST['table'] == 'exercise_muscle') {
		$vars = array(
		);
		foreach ($_POST['muscle_list'] as $muscle_id) {
			$values = array(
			);
			insert_values($_POST['table'], $vars, $values);
		}

    //Create a new exercise
	} elseif ($_POST['table'] == 'exercise') {
		$vars = array(
			'exercise', 
			'difficulty', 
			'primary_func', 
			'primary_plane', 
			'notes'
		);
		$values = array(
			$_POST['exercise'], 
			$_POST['difficulty'],
			$_POST['primary_func'],
			$_POST['primary_plane'],
			$_POST['notes']
		);
		insert_values($_POST['table'], $vars, $values);

	}

}

include_once('insert_values.php');
//Choose table columns and variables then insert into MySQL database
choose_table();

//Redirect back to the last page
header('Location: ' . $_SERVER['HTTP_REFERER']);

// EOF

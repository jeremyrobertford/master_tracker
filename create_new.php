<?php

function choose_table() {

    //Create a new muscle
	if ($_POST['table'] == 'muscle') {
		$vars = array(
		);
		$values = array(
		);
		insert_values($_POST['table'], $vars, $values);

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

		include('connect_sql.php');
		$sql = 'SELECT ID FROM master_tracker.exercise';
		$sql = $sql . ' WHERE exercise="' . $_POST['exercise'] . '"';

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$exercise_id = $row['ID'];
		$conn->close();

        //Connect an exercise to the muscles it uses
		$_POST['table'] = 'exercise_muscle';
		$vars = array(
			'exercise_id',
			'muscle_id',
			'emphasis'
		);
		$num_muscles = count($_POST['muscle_list']);
		for ($i = 0; $i < $num_muscles; $i++) {
			if (in_array($_POST['muscle_list'][$i], $_POST['emphasis_list'])) {
				$emphasis = 1;
			} else {
				$emphasis = 0;
			}
			$values = array(
				$exercise_id,
				$_POST['muscle_list'][$i],
				$emphasis
			);
			insert_values($_POST['table'], $vars, $values);
		}

	}

}

include_once('insert_values.php');
//Choose table columns and variables then insert into MySQL database
choose_table();

//Redirect back to home page
header('Location: ' . '/');

//Redirect back to the last page
//header('Location: ' . $_SERVER['HTTP_REFERER']);

// EOF

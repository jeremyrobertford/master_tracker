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

    //Create a new workout
	} elseif ($_POST['table'] == 'workout') {
		$vars = array(
			'name', 
			'difficulty', 
			'area_focus', 
			'part_focus', 
			'func_focus', 
			'plane_focus', 
			'notes'
		);
		$values = array(
			$_POST['name'], 
			$_POST['difficulty'],
			$_POST['area_focus'],
			$_POST['part_focus'],
			$_POST['func_focus'],
			$_POST['plane_focus'],
			$_POST['notes']
		);
		insert_values($_POST['table'], $vars, $values);

		include('connect_sql.php');
		$sql = 'SELECT ID FROM master_tracker.workout';
		$sql = $sql . ' WHERE name="' . $_POST['name'] . '"';

		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$workout_id = $row['ID'];
		$conn->close();

        //Connect a workout to the exercises it uses
		$_POST['table'] = 'workout_exercise';
		$vars = array(
			'workout_id',
			'exercise_id',
			'sets',
			'reps',
			'rest',
			'reason',
			'notes'
		);
		$num_exercises = count($_POST['exercise_list']);
		for ($i = 0; $i < $num_exercises; $i++) {
			$values = array(
				$workout_id,
				$_POST['exercise_list'][$i],
				$_POST['sets_list'][$i],
				$_POST['reps_list'][$i],
				$_POST['rest_list'][$i],
				$_POST['reason_list'][$i],
				$_POST['notes_list'][$i]
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

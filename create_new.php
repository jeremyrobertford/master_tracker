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
	
    //Create a new food
	} elseif ($_POST['table'] == 'food') {
		$vars = array(
		    'food',
	        'serving_size',
	        'serving_uom',
	        'carbs',
	        'protein',
	        'fats',
	        'calories',
	        'brand',
	        'cooking_type',
	        'category',
	        'subcategory',
	        'fiber',
	        'sugar',
	        'saturated_fats',
	        'monounsaturated_fats',
	        'polyunsaturated_fats',
	        'trans_fats',
	        'omega_3',
	        'omega_6',
	        'cholesterol',
	        'histidine',
	        'isoleucine',
	        'leucine',
	        'lysine',
	        'methionine',
	        'phenylalanine',
	        'threonine',
	        'tryptophan',
	        'valine',
	        'arginine',
	        'vitamin_a',
	        'vitamin_b1',
	        'vitamin_b2',
	        'vitamin_b3',
	        'vitamin_b5',
	        'vitamin_b6',
	        'vitamin_b7',
	        'vitamin_b9',
	        'vitamin_b12',
	        'vitamin_c',
	        'vitamin_d',
	        'vitamin_e',
	        'vitamin_k',
	        'calcium',
	        'iron',
	        'potassium',
	        'selenium',
	        'sodium',
	        'zinc',
	        'alcohol',
	        'caffeine',
		);
		$values = array(
		    $_POST['food'],
	        $_POST['serving_size'],
	        $_POST['serving_uom'],
	        $_POST['carbs'],
	        $_POST['protein'],
	        $_POST['fats'],
	        $_POST['calories'],
	        $_POST['brand'],
	        $_POST['cooking_type'],
	        $_POST['category'],
	        $_POST['subcategory'],
	        $_POST['fiber'],
	        $_POST['sugar'],
	        $_POST['saturated_fats'],
	        $_POST['monounsaturated_fats'],
	        $_POST['polyunsaturated_fats'],
	        $_POST['trans_fats'],
	        $_POST['omega_3'],
	        $_POST['omega_6'],
	        $_POST['cholesterol'],
	        $_POST['histidine'],
	        $_POST['isoleucine'],
	        $_POST['leucine'],
	        $_POST['lysine'],
	        $_POST['methionine'],
	        $_POST['phenylalanine'],
	        $_POST['threonine'],
	        $_POST['tryptophan'],
	        $_POST['valine'],
	        $_POST['arginine'],
	        $_POST['vitamin_a'],
	        $_POST['vitamin_b1'],
	        $_POST['vitamin_b2'],
	        $_POST['vitamin_b3'],
	        $_POST['vitamin_b5'],
	        $_POST['vitamin_b6'],
	        $_POST['vitamin_b7'],
	        $_POST['vitamin_b9'],
	        $_POST['vitamin_b12'],
	        $_POST['vitamin_c'],
	        $_POST['vitamin_d'],
	        $_POST['vitamin_e'],
	        $_POST['vitamin_k'],
	        $_POST['calcium'],
	        $_POST['iron'],
	        $_POST['potassium'],
	        $_POST['selenium'],
	        $_POST['sodium'],
	        $_POST['zinc'],
	        $_POST['alcohol'],
	        $_POST['caffeine'],
		);
		insert_values($_POST['table'], $vars, $values);

    //Record body composition
	} elseif ($_POST['table'] == 'body_composition') {
		$vars = array(
			'date',
			'age',
			'gender',
			'height',
			'weight',
			'fat_percent',
			'water_percent',
			'activity_level',
			'face_skin_rating',
			'body_skin_rating'
		);
		$values = array(
			$_POST['date'],
			$_POST['age'],
			$_POST['gender'],
			$_POST['height'],
			$_POST['weight'],
			$_POST['fat_percent'],
			$_POST['water_percent'],
			$_POST['activity_level'],
			$_POST['face_skin_rating'],
			$_POST['body_skin_rating']
		);
		insert_values($_POST['table'], $vars, $values);


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

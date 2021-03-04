CREATE TABLE master_tracker.workout_exercise (
	workout_id smallint,
	exercise_id smallint,
	sets tinyint,
	reps tinyint,
	rest tinyint,
	CONSTRAINT workout_exercise_pkey
		PRIMARY KEY (workout_id, exercise_id),
	CONSTRAINT workout_exercise_workout_id_fkey 
		FOREIGN KEY (workout_id) REFERENCES master_tracker.workout(ID),
	CONSTRAINT workout_exercise_exercise_id_fkey 
		FOREIGN KEY (exercise_id) REFERENCES master_tracker.exercise(ID)
);
CREATE TABLE master_tracker.exercise_muscle (
	exercise_id smallint,
	muscle_id smallint,
	emphasis tinyint(1),
	CONSTRAINT exercise_muscle_pkey
		PRIMARY KEY (exercise_id, muscle_id),
	CONSTRAINT exercise_muscle_exercise_id_fkey 
		FOREIGN KEY (exercise_id) REFERENCES master_tracker.exercise(ID),
	CONSTRAINT exercise_muscle_muscle_id_fkey 
		FOREIGN KEY (muscle_id) REFERENCES master_tracker.muscle(ID)
);

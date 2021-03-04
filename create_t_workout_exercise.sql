CREATE TABLE master_tracker.workout_exercise (
	ID           smallint AUTO_INCREMENT,
	workout_id   smallint NOT NULL,
	exercise_id  smallint NOT NULL,
	sets         tinyint NOT NULL,
	reps         smallint NOT NULL,
	rest         smallint NOT NULL,
	reason       varchar(50) NOT NULL,
	notes        varchar(255),
	CONSTRAINT workout_exercise_pkey
		PRIMARY KEY (ID),
	CONSTRAINT workout_exercise_workout_id_fkey 
		FOREIGN KEY (workout_id) REFERENCES master_tracker.workout(ID),
	CONSTRAINT workout_exercise_exercise_id_fkey 
		FOREIGN KEY (exercise_id) REFERENCES master_tracker.exercise(ID)
);

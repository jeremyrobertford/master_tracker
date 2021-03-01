CREATE TABLE master_tracker.exercise (
	ID smallint AUTO_INCREMENT,
	exercise varchar(100) NOT NULL,
	difficulty varchar(12) NOT NULL,
	primary_func char(4) NOT NULL,
	primary_plane varchar(10) NOT NULL,
	notes varchar(255),
	CONSTRAINT exercise_pkey PRIMARY KEY (ID)
);

CREATE UNIQUE INDEX exercise_idx
ON master_tracker.exercise (exercise);
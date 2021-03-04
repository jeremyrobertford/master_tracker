CREATE TABLE master_tracker.workout (
	ID smallint AUTO_INCREMENT,
	name varchar(100) NOT NULL,
	area_focus char(5) NOT NULL,
	part_focus char(4) NOT NULL,
	func_focus varchar(15) NOT NULL,
	plane_focus varchar(10) NOT NULL,
	notes varchar(255),
	CONSTRAINT workout_pkey PRIMARY KEY (ID)
);

CREATE UNIQUE INDEX workout_idx
ON master_tracker.workout (name);

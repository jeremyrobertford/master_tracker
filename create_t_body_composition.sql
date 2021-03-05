CREATE TABLE master_tracker.body_composition (
	ID                smallint AUTO_INCREMENT,
	age				  tinyint NOT NULL,
	gender			  char(1) NOT NULL,
	height			  decimal(3,1) NOT NULL,
	weight            decimal(5,1) NOT NULL,
	fat_percent       decimal(4,1),
	water_percent     decimal(4,1),
	muscle_percent    decimal(4,1)
		GENERATED ALWAYS AS (100-fat_percent-water_percent) STORED,
	bmi               decimal(3,1) 
		GENERATED ALWAYS AS ((weight/2.205) / POWER(height/39.37,2)) STORED,
	activity_level    decimal(3,1) NOT NULL,
	tdee              decimal(5,1)
		GENERATED ALWAYS AS (
			CASE
				WHEN gender="m" THEN 10 * (weight/2.205) + 6.25 * (height/0.3937) - 5 * age + 5
				ELSE 10 * (weight/2.205) + 6.25 * (height/0.3937) - 5 * age - 161
			END
		),
	face_skin_rating  tinyint(10),
	body_skin_rating  tinyint(10),
	CONSTRAINT body_composition_pkey PRIMARY KEY (ID)
);
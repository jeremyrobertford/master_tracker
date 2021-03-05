CREATE TABLE master_tracker.body_measurement (
	ID                smallint AUTO_INCREMENT,
	body_date         datetime NOT NULL,
	neck              decimal(3,1),
	shoulders         decimal(3,1),
	chest             decimal(3,1),
	flexed_l_arm      decimal(3,1),
	flexed_r_arm      decimal(3,1),
	l_forearm         decimal(3,1),
	r_forearm         decimal(3,1),
	l_wrist           decimal(3,1),
	r_wrist           decimal(3,1),
	waist             decimal(3,1),
	hips              decimal(3,1),
	butt              decimal(3,1),
	flexed_l_thigh    decimal(3,1),
	flexed_r_thigh    decimal(3,1),
	l_knee            decimal(3,1),
	r_knee            decimal(3,1),
	flexed_l_calve    decimal(3,1),
	flexed_r_calve    decimal(3,1),
	gr_shoulders      decimal(4,3)
		GENERATED ALWAYS AS (shoulders/waist) STORED,
	gr_chest          decimal(4,3)
		GENERATED ALWAYS AS (chest/ ((l_wrist+r_wrist)/2)) STORED,
	gr_arms           decimal(4,3)
		GENERATED ALWAYS AS (((flexed_l_arm+flexed_r_arm)/2)/ ((l_wrist+r_wrist)/2)) STORED,
	gr_thighs         decimal(4,3)
		GENERATED ALWAYS AS (((flexed_l_thigh+flexed_r_thigh)/2)/ ((l_knee+r_knee)/2)) STORED,
	gr_calves         decimal(4,3)
		GENERATED ALWAYS AS (((flexed_l_calve+flexed_r_calve)/2)/ ((l_arm+r_arm)/2)) STORED,
	arm_balance      decimal(4,3)
		GENERATED ALWAYS AS (flexed_l_arm/flexed_r_arm) STORED,
	arm_balance      decimal(4,3)
		GENERATED ALWAYS AS (l_forearm/r_forearm) STORED,
	thigh_balance      decimal(4,3)
		GENERATED ALWAYS AS (flexed_l_thigh/flexed_r_thigh) STORED,
	calve_balance      decimal(4,3)
		GENERATED ALWAYS AS (flexed_l_calve/flexed_r_calve) STORED,
	CONSTRAINT body_measurement_pkey PRIMARY KEY (ID)
);
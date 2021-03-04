CREATE TABLE master_tracker.muscle (
    ID               tinyint AUTO_INCREMENT,
    muscle           varchar(50) UNIQUE NOT NULL,
    scientific_name  varchar(100) NOT NULL,
    area             char(5) NOT NULL,
    part             varchar(8) NOT NULL,
    func             char(4) NOT NULL,
    scientific_func  varchar(255) NOT NULL,
    CONSTRAINT muscle_pkey PRIMARY KEY (ID)
);

CREATE UNIQUE INDEX muscle_idx
ON master_tracker.muscle (muscle);

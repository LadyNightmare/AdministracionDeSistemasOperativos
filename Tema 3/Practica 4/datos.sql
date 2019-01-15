USE fotovoltaica;

INSERT INTO MODULO(NOMBRE,DESCRIPCION,TENSION,CORRIENTE) VALUES 
('Isofotón I-94','Módulo de silicio monocristalino',17.5,6.56),
('Sharp NV456','Módulo de sicilio policristalino',34.8,8.94),
('Phoenix Solar PHV-120','Módulo de capa delgada (CdTe)',121.2,1.54),
('Jingli Solar','Módulo de silicio policristalino de 72 células',40.5,9.65);

INSERT INTO CAMPANIA(MODULO,NOMBRE,FECHAINI,FECHAFIN) VALUES 
(1,'Ángulo 10','2003-10-01','2003-10-31'),
(1,'Ángulo 20','2003-11-01','2003-11-30'),
(1,'Ángulo 30','2003-12-01','2003-12-31'),
(1,'Ángulo 40','2004-01-01','2004-01-31'),
(1,'Ángulo 50','2004-02-01','2004-02-29'),
(1,'Ángulo 60','2004-03-01','2004-03-31'),
(1,'Ángulo 70','2004-04-01','2004-04-30'),
(1,'Ángulo 80','2004-05-01','2004-05-31'),
(2,'Módulo limpio','2004-06-01','2004-06-30'),
(2,'Módulo sucio','2004-07-01','2004-07-31'),
(3,'Día despejado','2005-06-01','2005-06-01'),
(3,'Día cubierto','2005-06-15','2004-06-15'),
(3,'Día lluvioso','2005-09-11','2005-09-11');


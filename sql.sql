/*Creación de la base datos, creación de tablas, inserción de datos en una tabla, selección de datos de una tabla MYSQL*/
create database full_calendar;
use full_calendar;
create table eventos(
  id int not null auto_increment primary key,
  title varchar(200),
  start datetime,
  end datetime,
  editable boolean default true,
  color varchar(200)
);
INSERT INTO `eventos` (`title`,`start`, `end`) VALUES
  ('Primer evento', '2017-10-03', '2017-10-05 00:00:00','http://www.google.com','Disponible', true),
  ('Segundo evento', '2017-10-04 10:00', '2017-10-05 00:00:00',null,'NoDisponible', true),
  ('Tercer evento', '2017-10-04', '2017-10-05 00:00:00',null,'NoDisponible', true);


INSERT INTO `eventos` (`title`,`start`, `end`,`url`,`className`,`editable`) VALUES
  ('Primer evento', '2018-01-01', '2018-01-01 00:00:00','http://www.google.com','Disponible', true),
  ('Segundo evento', '2018-01-02 10:00', '2018-01-02 00:00:00',null,'NoDisponible', true),
  ('Tercer evento', '2018-01-03', '2018-01-03 00:00:00',null,'NoDisponible', true);

select * from eventos
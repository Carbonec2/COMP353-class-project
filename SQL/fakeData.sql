INSERT INTO contract_type VALUES ('Premium'), ('Gold'), ('Diamond'), ('Silver');


INSERT INTO role VALUES ('Associate'),
INSERT INTO role VALUES ('Manager'),
INSERT INTO role VALUES ('Employee'),
INSERT INTO role VALUES ('Admin'),

INSERT INTO line_of_business VALUES 
  ('Cloud Services'), 
  ('Development'), 
  ('Research'), 
  ('Business Development'), 
  ('Facilities Management');


INSERT INTO platform VALUES ('Cloud');
INSERT INTO platform VALUES ('On-Premises');

-- Department (Dev, QA, UI, )
-- Manager
-- Double CAD
-- start date default today
-- type of service
-- Contract (premium, gold, diamond, silver)
-- ER Model
-- Assumptions
-- populate tables
-- key attributes


-- Diamond Contract Type

-- Customer Associate
-- No Departments .... Line of Business


-- Project

-- PHP, MySQL
-- representative, query
-- well defined portion
-- Demo
-- sales associate
-- address
-- select province
-- list managers
-- select category
-- category = contract_type
-- managers and work choices agreement
-- expired contracts
-- hours of work
-- remove from a contract
-- categories = contract type
-- 3 kinds of insurance plans
-- populate each table with 20 records
-- 10 contracts and 5 businesses to select from
-- record line of business
-- recorded date
-- ER Diagram NOT EER
-- Relational Database Schema
-- 3NF
-- 10 to 20 tuples
-- screenshots
-- DDL
-- member contributions



-- NO SWEARING !!!!!!!!
INSERT INTO account VALUES
  (1, 'Jim','A', 'Macdonald', 'something@something.com', '111 111 1111'),
  (2, 'Sam', 'J', 'Harpeur', 'con@con.com', '222 222 2222'),
  (3, 'Sophie', 'A', 'Claus', 'christmas@northpole.com', '333 333 3333'),
  (4, 'Dave', 'J', 'Trump', 'fake@news.com', '444 444 4444'),
  (5, 'Adam', 'B', 'Jackass', 'dublin@preclearance.com' '555 555 5555'),
  (6, 'Bob', 'B', 'Gratton', 'bob@bob.com', '666 666 6666'),
  (7, 'Octave', 'B', 'Cremazie', 'metro@mtl.com', '777 777 7777'),
  (8, 'Jean', 'V', 'Jean', 'miserable@jail.com', '888 888 8888'),
  (9, 'Mark', 'T', 'Putin', 'russia@us.com', '999 999 9999'),
  (10, 'Done', 'A', 'Not', 'work@study.com', '666 666 6666')
  (11, 'Sean','B', 'MacDonald', 'something@something2.com', '111 111 1111'),
  (12, 'Smith', 'D', 'Trudeau', 'con@progressive.com', '222 222 2222'),
  (13, 'Sen', 'A', 'Poutine', 'poutine@quebec.com', '333 333 3333'),
  (14, 'Don', 'J', 'Trump', 'fakenews@everything.com', '444 444 4444'),
  (15, 'Abe', 'B', 'Lincoln', 'dublin@preclearance.com' '555 555 5555'),
  (16, 'Sophie', 'B', 'Tremblay', 'tby@bob.com', '666 666 6666'),
  (17, 'Octave', 'B', 'Cremazie', 'metro@mtl.com', '777 777 7777'),
  (18, 'Jean', 'V', 'Jean', 'miserable@jail.com', '888 888 8888'),
  (19, 'Meriem', 'T', 'Peter', 'russia@us.com', '999 999 9999'),
  (20, 'Done', 'A', 'Not', 'work@study.com', '666 666 6666'),
  (21, 'Jim','A', 'Macdonald', 'something@something.com', '111 111 1111'),
  (22, 'Sam', 'J', 'Harpeur', 'con@con.com', '222 222 2222'),
  (23, 'Sophie', 'A', 'Claus', 'christmas@northpole.com', '333 333 3333'),
  (24, 'Dave', 'J', 'Trump', 'fake@news.com', '444 444 4444'),
  (25, 'Adam', 'B', 'Jackass', 'dublin@preclearance.com' '555 555 5555'),
  (26, 'Bob', 'B', 'Gratton', 'bob@bob.com', '666 666 6666'),
  (27, 'Octave', 'B', 'Cremazie', 'metro@mtl.com', '777 777 7777'),
  (28, 'Jean', 'V', 'Jean', 'miserable@jail.com', '888 888 8888'),
  (29, 'Mark', 'T', 'Putin', 'russia@us.com', '999 999 9999'),
  (30, 'Done', 'A', 'Not', 'work@study.com', '666 666 6666')
  (31, 'Sean','B', 'MacDonald', 'something@something2.com', '111 111 1111'),
  (32, 'Smith', 'D', 'Trudeau', 'con@progressive.com', '222 222 2222'),
  (33, 'Sen', 'A', 'Poutine', 'poutine@quebec.com', '333 333 3333'),
  (34, 'Don', 'J', 'Trump', 'fakenews@everything.com', '444 444 4444'),
  (35, 'Abe', 'B', 'Lincoln', 'dublin@preclearance.com' '555 555 5555'),
  (36, 'Sophie', 'B', 'Tremblay', 'tby@bob.com', '666 666 6666'),
  (37, 'Octave', 'B', 'Cremazie', 'metro@mtl.com', '777 777 7777'),
  (38, 'Jean', 'V', 'Jean', 'miserable@jail.com', '888 888 8888'),
  (39, 'Meriem', 'T', 'Peter', 'russia@us.com', '999 999 9999'),
  (40, 'Done', 'A', 'Not', 'work@study.com', '666 666 6666')


-- NO ROLE AND NO INSURANCE PLAN
INSERT INTO employee VALUES
  (1, 'Premium', 'QA', 20, 'MB'),
  (2, 'Silver', 'UI', 40, 'QC'),
  (3, 'Normal', 'Design', 15, 'ON'),
  (4, 'Normal', 'Development', 10, 'AB'),
  (5, 'Normal', 'Business Intelligence', 18, 'BC');
  (6, 'Premium', 'Networking', 15, 'SK'),
  (7, 'Normal', 'Networking', 7, 'BC'),
  (8, 'Silver', 'Business Intelligence', 3, 'AB'),
  (9, 'Premium', 'Business Intelligence', 7, 'BC'),
  (10, 'Normal', 'UI', 8, 'SK');
  (11, 'Premium', 'QA', 20, 'MB'),
  (12, 'Silver', 'UI', 40, 'QC'),
  (13, 'Normal', 'Design', 15, 'ON'),
  (14, 'Normal', 'Development', 10, 'AB'),
  (15, 'Normal', 'Business Intelligence', 18, 'BC');
  (16, 'Premium', 'Networking', 15, 'SK'),
  (17, 'Normal', 'Networking', 7, 'BC'),
  (18, 'Silver', 'Business Intelligence', 3, 'AB'),
  (19, 'Premium', 'Business Intelligence', 7, 'BC'),
  (20, 'Normal', 'UI', 8, 'SK');

INSERT INTO client VALUES
  (21, )

INSERT INTO contract VALUES
  (1, 21, 'Cloud Services', 'Premium', 'Cloud', 1, '2018-07-31', '2019-01-01', 2),
  (2, 22, 'Development', 'Gold', 'Cloud', 2, '2017-06-28', '2017-02-14', 5),
  (3, 23, 'Research', 'Silver', 'On-Premises', 3, '2017-07-31', '2018-01-01', 7),
  (4, 24, 'Business Development', 'Premium', 'Cloud', 4, '2018-07-26', '2019-01-01', 8),
  (5, 25, 'Facilities Management', 'Diamond', 'On-Premises', 5, '2018-07-23', '2019-01-01', 8),
  (6, 26, 'Research', 'Premium', 'Cloud', 6, '2018-07-31', '2019-01-01', 2),
  (7, 27, 'Facilities Management', 'Premium', 'On-Premises', 7, '2017-06-28', '2017-02-14', 5),
  (8, 28, 'Cloud Services', 'Premium', 'Cloud', 8, '2017-07-31', '2018-01-01', 7),
  (9, 29, 'Research', 'Diamond', 'Cloud', 9, '2018-07-25', '2019-01-01', 8),  
  (10, 30, 'Business Development', 'Silver', 'On-Premises', 10, '2018-07-28', '2019-01-01', 8),
  (11, 31, 'Cloud Services', 'Gold', 'Cloud', 11, '2018-07-31', '2019-01-01', 2),
  (12, 32, 'Research', 'Premium', 'Cloud', 12, '2017-06-28', '2017-02-14', 5),
  (13, 33, 'Business Development', 'Premium', 'On-Premises', 13, '2017-07-31', '2018-01-01', 7),
  (14, 34, 'Facilities Management', 'Premium', 'Cloud', 14, '2018-07-26', '2019-01-01', 8),
  (15, 35, 'Cloud Services', 'Silver', 'On-Premises', 15, '2018-07-23', '2019-01-01', 8),
  (16, 36, 'Business Development', 'Premium', 'On-Premises', 16, '2018-07-31', '2019-01-01', 2),
  (17, 37, 'Cloud Services', 'Premium', 'On-Premises', 17, '2017-06-28', '2017-02-14', 5),
  (18, 38, 'Facilities Management', 'Premium', 'Cloud', 18, '2017-07-31', '2018-01-01', 7),
  (19, 39, 'Research', 'Premium', 'On-Premises', 19, '2018-07-25', '2019-01-01', 8),  
  (20, 40, 'Development', 'Premium', 'On-Premises', 20, '2018-07-28', '2019-01-01', 8);

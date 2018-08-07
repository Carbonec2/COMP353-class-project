INSERT INTO `ContractType` VALUES 
  ('Premium'), 
  ('Gold'), 
  ('Diamond'), 
  ('Silver');

INSERT INTO `InsurancePlan` VALUES 
  ('Premium', 90), 
  ('Normal', 80), 
  ('Silver', 70);

INSERT INTO `RoleType` VALUES 
  ('Associate'),
  ('Manager'),
  ('Employee'),
  ('Admin');

INSERT INTO `City` VALUES 
  ('Montreal', 'QC'),
  ('Ottawa', 'ON'),
  ('Toronto', 'ON'),
  ('Winnipeg', 'MB'),
  ('St-Hubert', 'QC'),
  ('Calgary', 'AB'),
  ('Edmonton', 'AB'),
  ('Vancouver', 'BC'),
  ('Bonaventure', 'QC'),
  ('Becancour', 'QC'),
  ('New Market', 'ON'),
  ('Mississiauga', 'ON');

INSERT INTO `LineOfBusiness` VALUES 
  ('Cloud Services'), 
  ('Development'), 
  ('Research'), 
  ('Business Development'), 
  ('Facilities Management');


INSERT INTO `PlatformType` VALUES ('Cloud');
INSERT INTO `PlatformType` VALUES ('On-Premises');



INSERT INTO `Account` VALUES
  (1, 'jamacdonald', 'PaSsWoRd',
    'something@something.com', '111 111 1111', 'Jim','A', 'Macdonald'),
  (2, 'sjharpeur', 'JeSuisLePremiereMinistre', 
    'con@con.com', '222 222 2222', 'Sam', 'J', 'Harpeur'),
  (3, 'saclaus', 'ItsChristmas',
    'christmas@northpole.com', '333 333 3333', 'Sophie', 'A', 'Claus'),
  (4, 'djtrump', 'CnnFakeNews',
    'fake@news.com', '444 444 4444', 'Dave', 'J', 'Trump'),
  (5, 'abjacob', 'IAmCalculus',
    'dublin@preclearance.com', '555 555 5555', 'Adam', 'B', 'Jacobian'),
  (6, 'bbgratton', 'WhoDis', 
    'bob@bob.com', '666 666 6666', 'Bob', 'B', 'Gratton'),
  (7, 'obcremazie', 'SurLaLigneOrange',
    'metro@mtl.com', '777 777 7777', 'Octave', 'B', 'Cremazie'),
  (8, 'jcchretien', 'AProofIsAProof',
    'miserable@jail.com', '888 888 8888', 'Jean', 'C', 'Chretien'),
  (9, 'mtputin', 'NotRussia', 
    'russia@us.com', '999 999 9999', 'Mark', 'T', 'Putin'),
  (10, 'danot', 'MehToday', 
    'work3@study.com', '666 666 6666', 'Done', 'A', 'Not'),
  (11, 'sbmacdonald', 'PMWannaBe', 
    'something@something2.com', '111 111 1111', 'Sean','B', 'MacDonald'),
  (12, 'sdtrudeau', 'LibEqualsPCs',
    'con@progressive.com', '222 222 2222', 'Smith', 'D', 'Trudeau'),
  (13, 'sapoutine', 'PoutineIsJustFries', 
    'poutine@quebec.com', '333 333 3333', 'Sen', 'A', 'Poutine'),
  (14, 'dpdavis', 'CircuitsRule', 
    'ece@everything.com', '444 444 4444', 'Don', 'P', 'Davis'),
  (15, 'abskywalker', 'DarthVader', 
    'starwars@galaxy.com', '555 555 5555', 'Anakin', 'B', 'Skywalker'),
  (16, 'sbtremblay', 'SomeoneHere',
    'tby@bob.com', '666 666 6666', 'Sophie', 'B', 'Tremblay'),
  (17, 'jblayton', 'BestPMNeverHad',
    'jblayton@mtl.com', '777 777 7777', 'Jack', 'B', 'Layton'),
  (18, 'jdcharest', 'BothPCandLiberal',
    'miserable@jail.com', '888 888 8888', 'Jean', 'D', 'Charest'),
  (19, 'ptjennings', 'TorontoAmericanJournalist',
    'ptjennings@abc.com', '999 999 9999', 'Peter', 'T', 'Jennings'),
  (20, 'danot', 'workingHard', 
    'work@study.com', '666 666 6666', 'Done', 'A', 'Not');
  -- (21, 'Jim','A', 'Macdonald', 'something@something.com', '111 111 1111'),
  -- (22, 'Sam', 'J', 'Harpeur', 'con@con.com', '222 222 2222'),
  -- (23, 'Sophie', 'A', 'Claus', 'christmas@northpole.com', '333 333 3333'),
  -- (24, 'Dave', 'J', 'Trump', 'fake@news.com', '444 444 4444'),
  -- (25, 'Adam', 'B', 'John', 'dublin@preclearance.com', '555 555 5555'),
  -- (26, 'Bob', 'B', 'Gratton', 'bob@bob.com', '666 666 6666'),
  -- (27, 'Octave', 'B', 'Cremazie', 'metro@mtl.com', '777 777 7777'),
  -- (28, 'Jean', 'V', 'Jean', 'miserable@jail.com', '888 888 8888'),
  -- (29, 'Mark', 'T', 'Putin', 'russia@us.com', '999 999 9999'),
  -- (30, 'Done', 'A', 'Not', 'work@study.com', '666 666 6666'),
  -- (31, 'Sean','B', 'MacDonald', 'something@something2.com', '111 111 1111'),
  -- (32, 'Smith', 'D', 'Trudeau', 'con@progressive.com', '222 222 2222'),
  -- (33, 'Sen', 'A', 'Poutine', 'poutine@quebec.com', '333 333 3333'),
  -- (34, 'Don', 'J', 'Trump', 'fakenews@everything.com', '444 444 4444'),
  -- (35, 'Abe', 'B', 'Lincoln', 'dublin@preclearance.com', '555 555 5555'),
  -- (36, 'Sophie', 'B', 'Tremblay', 'tby@bob.com', '666 666 6666'),
  -- (37, 'Octave', 'B', 'Cremazie', 'metro@mtl.com', '777 777 7777'),
  -- (38, 'Jean', 'V', 'Jean', 'miserable@jail.com', '888 888 8888'),
  -- (39, 'Meriem', 'T', 'Peter', 'russia@us.com', '999 999 9999'),
  -- (40, 'Done', 'A', 'Not', 'work@study.com', '666 666 6666');

INSERT INTO `Employee` VALUES
  (101, 'Cloud Services', 'Premium', 'Associate', '10.00', 1, 'Montreal', 'QC'),
  (102, 'Research', 'Silver', 'Manager', 30, 2, 'Montreal', 'QC'),
  (103, 'Business Development', 'Premium', 'Admin', 60, 3, 'Toronto', 'ON'),
  (104, 'Development', 'Normal', 'Admin', 20,  4, 'Edmonton', 'AB'),
  (105, 'Research', 'Silver', 'Employee', 45, 5, 'Vancouver', 'BC'),
  (106, 'Cloud Services', 'Normal', 'Associate', 36, 6, 'Winnipeg', 'MB'),
  (107, 'Research', 'Silver', 'Manager', 45, 7, 'Montreal', 'QC'),
  (108, 'Business Development', 'Premium', 'Employee', 40, 8, 'Toronto', 'ON'),
  (109, 'Development', 'Normal', 'Admin', 45, 9, 'Edmonton', 'AB'),
  (110, 'Research', 'Silver','Employee', 30, 5, 'Vancouver', 'BC');
  -- (11, 'Premium', 'Manager', 20, 'MB'),
  -- (12, 'Silver', 'Associate', 40, 'QC'),
  -- (13, 'Normal', 'Manager', 15, 'ON'),
  -- (14, 'Normal', 'Employee', 10, 'AB'),
  -- (15, 'Normal', 'Admin', 18, 'BC'),
  -- (16, 'Premium', 'Manager', 15, 'SK'),
  -- (17, 'Normal', 'Manager', 7, 'BC'),
  -- (18, 'Silver', 'Admin', 3, 'AB'),
  -- (19, 'Premium', 'Employee', 7, 'BC'),
  -- (20, 'Normal', 'Employee', 8, 'SK');

INSERT INTO `Client` VALUES
  -- (50, 21, 'Coca-Cola', '123 Fake St', 'Ottawa', 'ON', 'E4W 2I6'),
  -- (51, 22, 'Pepsi', '1600 Maisonneuve', 'Montreal', 'QC', 'H2X 2H2'),
  -- (52, 23, 'St-Hubert', '456 St-Catherine', 'St-Hubert', 'QC', 'E4W 2I6'),
  -- (53, 24, 'Nike', '1600 Maisonneuve', 'Edmonton', 'AB', 'H2X 2H2'),
  -- (54, 25, 'YVR', '3211 Grant McConachie Way', 'Vancouver', 'BC', 'E4W 2I6'),
  -- (55, 26, 'Adidas', '3400 McTavish', 'Toronto', 'ON', 'H2X 2H2'),
  -- (56, 27, 'Trump Inc', '1600 Pennsylvania', 'Winnipeg', 'MB', 'A4W 2I6'),
  -- (57, 28, 'CO2', '2456 Oxygen', 'Montreal', 'QC', 'H2X 2H2'),
  -- (58, 29, 'US Preclearance', '2000 Airport Rd NE', 'Calgary', 'AB', 'T2E 6W5'),
  -- (59, 30, 'WeThePeople', '234 rue Berri', 'Montreal', 'QC', 'H2X 2H2'),
  -- (60, 31, 'C++ Inc', '123 Fake St', 'Ottawa', 'ON', 'E4W 2I6'),
  -- (61, 32, 'RailVision', '4224 POWDERHORN CRES.', 'Mississiauga', 'ON', 'L5L 3B9'),
  -- (62, 33, 'Go Transit', '1600 Maisonneuve', 'Montreal', 'QC', 'H2X 2H2'),
  -- (63, 34, 'AMT', '3628 Avenue de Port-Royal', 'Bonaventure', 'QC', 'G0C 1E0'),
  -- (64, 35, 'RTM', '4143 Cote Joyeuse', 'Becancour', 'QC', 'H0H 0H0'),
  -- (65, 36, 'exo', '3101 Davis Drive', 'New Market', 'ON', 'L3Y 4W2'),
  -- (66, 37, 'STM', '12789 Adelaide St', 'Toronto', 'ON', 'M5H 1P6'),
  -- (67, 38, 'STL', '1600 Maisonneuve', 'Montreal', 'QC', 'H2X 2H2'),
  -- (68, 39, 'RTL', '2100 Maisonneuve O', 'Montreal', 'QC', 'H3H 1K6'),
  -- (69, 40, 'Air Transat', '300 Leo Pariseau', 'Montreal', 'QC', 'H2X 4C1');  


INSERT INTO contract VALUES
  -- (1, 50, 'Cloud Services', 'Premium', 'Cloud', 1, '2018-07-31', '2019-01-01', 2),
  -- (2, 51, 'Development', 'Gold', 'Cloud', 2, '2017-06-28', '2017-02-14', 5),
  -- (3, 52, 'Research', 'Silver', 'On-Premises', 3, '2017-07-31', '2018-01-01', 7),
  -- (4, 53, 'Business Development', 'Premium', 'Cloud', 4, '2018-07-26', '2019-01-01', 8),
  -- (5, 54, 'Facilities Management', 'Diamond', 'On-Premises', 5, '2018-07-23', '2019-01-01', 8),
  -- (6, 55, 'Research', 'Premium', 'Cloud', 6, '2018-07-31', '2019-01-01', 2),
  -- (7, 56, 'Facilities Management', 'Premium', 'On-Premises', 7, '2017-06-28', '2017-02-14', 5),
  -- (8, 57, 'Cloud Services', 'Premium', 'Cloud', 8, '2017-07-31', '2018-01-01', 7),
  -- (9, 58, 'Research', 'Diamond', 'Cloud', 9, '2018-07-25', '2019-01-01', 8),  
  -- (10, 59, 'Business Development', 'Silver', 'On-Premises', 10, '2018-07-28', '2019-01-01', 8),
  -- (11, 60, 'Cloud Services', 'Gold', 'Cloud', 11, '2018-07-31', '2019-01-01', 2),
  -- (12, 61, 'Research', 'Premium', 'Cloud', 12, '2017-06-28', '2017-02-14', 5),
  -- (13, 62, 'Business Development', 'Premium', 'On-Premises', 13, '2017-07-31', '2018-01-01', 7),
  -- (14, 63, 'Facilities Management', 'Premium', 'Cloud', 14, '2018-07-26', '2019-01-01', 8),
  -- (15, 64, 'Cloud Services', 'Silver', 'On-Premises', 15, '2018-07-23', '2019-01-01', 8),
  -- (16, 65, 'Business Development', 'Premium', 'On-Premises', 16, '2018-07-31', '2019-01-01', 2),
  -- (17, 66, 'Cloud Services', 'Premium', 'On-Premises', 17, '2017-06-28', '2017-02-14', 5),
  -- (18, 67, 'Facilities Management', 'Premium', 'Cloud', 18, '2017-07-31', '2018-01-01', 7),
  -- (19, 68, 'Research', 'Premium', 'On-Premises', 19, '2018-07-25', '2019-01-01', 8),  
  -- (20, 69, 'Development', 'Premium', 'On-Premises', 20, '2018-07-28', '2019-01-01', 8);

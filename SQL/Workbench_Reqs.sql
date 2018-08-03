-- 1 --
INSERT INTO `Account` ($id, $username, $password,
   $email, $phone,
   $first_name, $middle_initial, $last_name
  );
INSERT INTO `Client` ($id, $company_name, $address,
  $postal_code, $account_ID, $city, $province);
-- 2 --
SELECT * FROM `City`;
-- 3 --
SELECT `firstName`, `middleInitial`, `lastName` 
FROM `Account` JOIN `Employee` JOIN `Contract`
ON `Contract`.`managerID` = `Account`.`id`
AND contract.id = $id;
-- 4 --
UPDATE `WorkChoice`
SET `contractType` = $contract_type
AND `platformType` = $platform
WHERE `employeeId` = $id;
-- 5 NEED TO DO REPORT --
-- 6 --
SELECT * FROM `Contract`
WHERE `Contract`.`clientId` = $id;
-- 7 NEED TO DO REPORT --
-- 8 MANAGER VS EMPLOYEE? --
-- 9 --
UPDATE `Contract`
SET `Contract`.`satisfactionScore` = score
WHERE `id` = $id;
-- 10 --
SELECT `satisfactionScore`
FROM `Contract`
WHERE `Contract`.`managerId` = $id;
-- 11 --
UPDATE `Contract`
SET `clientId` = $client
AND `contractType` = $contract_type
AND `platformType` = $platform
AND `managerId` = $manager
AND `serviceStartDate` = $start_date
AND `serviceEtartDate` = $end_date
AND `satisfactionScore` = $satisfaction_score   
WHERE `id` = $id;
-- 12 HOW DOES CONTRACT PLAY INTO PLATFORM? --


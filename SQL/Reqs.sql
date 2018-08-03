-- 1 --
INSERT INTO account($id, $first_name, $middle_initial, $last_name,
  $email, $phone);
INSERT INTO account_login($id, $username, $password);
INSERT INTO client($id, $client_rep, $company_name, $address,
  $city, $province, $postal_code);
-- 2 --
SELECT * FROM city;
-- 3 --
SELECT first_name, middle_initial, last_name 
FROM account JOIN employee JOIN contract
ON contract.manager = account.id
AND contract.id = $id;
-- 4 --
UPDATE work_choice
SET contract_type = $contract_type
AND platform = $platform
WHERE employee = $id;
-- 5 NEED TO DO REPORT --
-- 6 --
SELECT * FROM contract
WHERE contract.client = $id;
-- 7 NEED TO DO REPORT --
-- 8 MANAGER VS EMPLOYEE? --
-- 9 --
UPDATE contract
SET contract.satisfaction_score = score
WHERE id = $id;
-- 10 --
SELECT satisfaction_score
FROM contract
WHERE contract.manager = $id;
-- 11 --
UPDATE contract
SET client = $client
AND line_of_business = $line_of_business
AND contract_type = $contract_type
AND platform = $platform
AND manager = $manager
AND start_date = $start_date
AND end_date = $end_date
AND satisfaction_score = $satisfaction_score   
WHERE id = $id;
-- 12 HOW DOES CONTRACT PLAY INTO PLATFORM? --


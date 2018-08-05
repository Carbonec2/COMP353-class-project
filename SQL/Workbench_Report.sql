-- 1 --
SELECT COUNT(DISTINCT(`employeeId`)) FROM `ContractAssignment`
JOIN `Employee` ON  `ContractAssignment`.`employeeId` = `Employee`.`id`
WHERE `insurancePlanName` = 'Premium'
GROUP BY `hoursWorked`
HAVING SUM(`hoursWorked`) < 60;
-- 2 --
SELECT COUNT(DISTINCT(`contractId`)) FROM `ContractAssignment`
JOIN `Contract` ON  `ContractAssignment`.`contractId` = `Contract`.`id`
WHERE `serviceEndDate` > ADDDATE(NOW(), 10)
GROUP BY `employeeId`
HAVING COUNT(DISTINCT(`employeeId`)) > 35;
-- 3 --



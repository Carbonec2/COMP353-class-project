-- https://www.dbrnd.com/2016/10/mysql-how-to-get-max-value-for-each-group/
-- 1 HAVING TROUBLE GETTING THE MOST OF EACH CATEGORY --
-- SELECT `clientId` FROM `contract`
-- WHERE
-- GROUP BY 'line_of_business'

-- SELECT ED1.*
-- FROM `contract` ED1                   
-- LEFT JOIN `contract` ED2       
--   ON ED1.`line_of_business` = ED2.`line_of_business` 
--   AND ED1.EmpSalary < ED2.EmpSalary
-- WHERE ED2.EmpSalary IS NULL
-- 2 --
SELECT * FROM `SaleRecord`
WHERE `recordedDate`  > ADDDATE(NOW(), -10)
-- 3 --
SELECT * FROM `Employee`
WHERE jurisdiction = 'QC';
-- 4 --
SELECT id FROM contract
where contract_type = 'Gold';
-- 5 NEED TO DO REPORT -- 

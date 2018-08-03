-- 1 HAVING TROUBLE GETTING THE MOST OF EACH CATEGORY --
SELECT * FROM `contract`
GROUP BY 'line_of_business'
-- 2 --
SELECT * FROM `SaleRecord`
WHERE `recordedDate`  > ADDDATE(NOW(), -10)
-- 3 --
SELECT * FROM `Employee`
JOIN `Client`
ON something
WHERE jurisdiction = 'QC';
-- 4 --
SELECT id FROM contract
where contract_type = 'Gold';
-- 5 NEED TO DO REPORT -- 

-- 1 --
SELECT client
FROM contract
WHERE COUNT(contract) = 1

-- 2 --
SELECT * FROM contract
WHERE start_date > ADDDATE(NOW(), -10)

-- 3 --
SELECT * FROM employee
WHERE jurisdiction = 'QC';

-- 4 --
SELECT id FROM contract
where contract_type = 'Gold';

-- 5 -- 

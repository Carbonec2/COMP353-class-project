-- 1 --
-- 2 --
-- 3 --
SELECT first_name, middle_initial, last_name 
FROM account JOIN employee JOIN contract
ON contract.manager = account.id
AND contract.id = $id;
-- 4 --
-- 5 --
-- 6 --
-- 7 --
-- 8 --
-- 9 --
-- 10 --
-- 11 --
-- 12 --


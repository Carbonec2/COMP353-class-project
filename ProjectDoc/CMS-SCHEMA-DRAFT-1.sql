DROP DATABASE IF EXISTS CMS_FINAL;
CREATE DATABASE CMS_FINAL;
USE CMS_FINAL;

SET FOREIGN_KEY_CHECKS=0;
-- ACCOUNTS --
/** All persons must have accounts to use the web interface **/
CREATE TABLE account (
  id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  /* is_employee BOOLEAN NOT NULL,*/
  first_name TEXT NOT NULL,
  middle_initial TEXT NOT NULL DEFAULT '',
  last_name TEXT NOT NULL,
  email TEXT NOT NULL,
  phone TEXT NOT NULL
);

CREATE TABLE account_login (
  id INTEGER NOT NULL,
  username TEXT NOT NULL,
  password TEXT NOT NULL,
  CONSTRAINT login_id FOREIGN KEY (id) 
    REFERENCES account (id)
);

/** Sales associate, Manager, employee, Admin **/
CREATE TABLE role (
  name VARCHAR(32) PRIMARY KEY NOT NULL
);

/** Types of insurance plans employees can have **/
CREATE TABLE insurance_plan (
  name VARCHAR(32) PRIMARY KEY NOT NULL,
  pct_reimbursed INTEGER NOT NULL
);

-- EMPLOYEES --
CREATE TABLE employee (
  id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  insurance_plan VARCHAR(32) NOT NULL,
  role VARCHAR(32) NOT NULL,
  weekly_hours INTEGER NOT NULL,
  CONSTRAINT employee_account FOREIGN KEY (id) 
    REFERENCES account (id),
  CONSTRAINT employee_insurance FOREIGN KEY (insurance_plan) 
    REFERENCES insurance_plan (name),
  CONSTRAINT employee_role FOREIGN KEY (role) 
    REFERENCES role (name)
);

/* Gold, Premium, Silver, ... */
CREATE TABLE contract_type (
  name VARCHAR(32) PRIMARY KEY NOT NULL
);


CREATE TABLE line_of_business (
  name VARCHAR(32) PRIMARY KEY NOT NULL
);

/* Think he means Cloud, On-Prem */
CREATE TABLE platform (
  name VARCHAR(32) PRIMARY KEY NOT NULL
);

CREATE TABLE city (
  city VARCHAR(16) NOT NULL,
  province ENUM('BC','AB','SK','MB','ON','QC',
  	'NB','NS','PE','DD','NL','YT','NT','NU') NOT NULL,
  PRIMARY KEY (city, province)
);

-- CLIENTS --
/** Clients sign up for contracts, here we store their details **/
CREATE TABLE client (
  id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  client_rep INTEGER NOT NULL, /** This is the account # **/
  company_name TEXT NOT NULL,
  address TEXT NOT NULL,
  city VARCHAR(16) NOT NULL,
  province ENUM('BC','AB','SK','MB','ON','QC',
  	'NB','NS','PE','DD','NL','YT','NT','NU') NOT NULL,
  postal_code CHAR(7) NOT NULL,
  CONSTRAINT FOREIGN KEY (client_rep)
    REFERENCES account (id),
  CONSTRAINT FOREIGN KEY (city, province)
    REFERENCES city (city, province)
);

-- CONTRACTS --
CREATE TABLE contract (
  id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  client INTEGER NOT NULL,
  line_of_business VARCHAR(32) NOT NULL,
  contract_type VARCHAR(32) NOT NULL,
  platform VARCHAR(32) NOT NULL,
  manager INTEGER NOT NULL,
  start_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  end_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  satisfaction_score INTEGER NOT NULL,
  CONSTRAINT contract_client FOREIGN KEY (client)
    REFERENCES client (id),
  CONSTRAINT contract_lob  FOREIGN KEY (line_of_business) 
    REFERENCES line_of_business (name),
  CONSTRAINT contract_ctype FOREIGN KEY (contract_type) 
    REFERENCES contract_type (name),
  CONSTRAINT contract_platform FOREIGN KEY (platform)
    REFERENCES platform (name),
  CONSTRAINT contract_manager FOREIGN KEY (manager) 
    REFERENCES employee (id)
);

/** Indicates what employees want to work on (why does this company let them choose) **/
CREATE TABLE work_choice (
  employee INTEGER NOT NULL,
  contract_type VARCHAR(32) NOT NULL,
  platform VARCHAR(32) NOT NULL,
  PRIMARY KEY (employee, contract_type, platform),
  CONSTRAINT choice_employee FOREIGN KEY (employee) 
    REFERENCES employee (id),
  CONSTRAINT choice_contract FOREIGN KEY (contract_type) 
    REFERENCES contract_type (name),
  CONSTRAINT choice_platform FOREIGN KEY (platform)  
    REFERENCES platform (name)
);

CREATE TABLE sale_record (
  contract INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  sales_associate INTEGER NOT NULL,
  initial_value DECIMAL(8,2) NOT NULL,
  annual_value DECIMAL(8,2) NOT NULL,
  CONSTRAINT sale_contract FOREIGN KEY (contract)
    REFERENCES contract (id),
  CONSTRAINT sale_associate FOREIGN KEY (sales_associate) 
    REFERENCES employee (id)
);

CREATE TABLE deliverable_standard (
  contract_type VARCHAR(32) NOT NULL,
  deliverable VARCHAR(32) NOT NULL,
  due_after INTEGER NOT NULL,
  PRIMARY KEY (contract_type, deliverable),
  CONSTRAINT deliverable_contract_type FOREIGN KEY (contract_type)
    REFERENCES contract_type (name)
);
/** Used by employees to track hours **/
CREATE TABLE contract_assignment (
  contract INTEGER NOT NULL,
  employee INTEGER NOT NULL,
  hours_worked INTEGER NOT NULL DEFAULT 0,
  PRIMARY KEY (contract, employee),
  FOREIGN KEY (contract) REFERENCES contract (id),
  FOREIGN KEY (employee) REFERENCES employee (id)
);

/** Used to determine if deliverables are on time **/
CREATE TABLE deliverable_log (
  contract INTEGER NOT NULL,
  deliverable VARCHAR(32) NOT NULL,
  completed_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (contract, deliverable) -- ,
  -- CONSTRAINT FOREIGN KEY (deliverable) 
  --  REFERENCES deliverable_standard (deliverable)
);

SET FOREIGN_KEY_CHECKS=1;

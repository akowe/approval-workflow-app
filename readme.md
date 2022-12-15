

## About this work flow app -  Laravel 5.7, PHP 7

Approvers hierarchy: in each department

Departments:

Finance Department
- level4 	= highest level  approver 	-  Director of Finance
- level3 	=  top level approver 		- Chief Financial Officer
- level2 	= middle level  approver 	- Account Manager
- level1 	= junior level 				- Account officer / Accountant


Operation Department
- level4  	= highest level approver 	- Director of Operation
- level3 	= top level approver 		- Chief Operation Officer
- level2 	= middle level approver 	- Operation Manager
- level1 	= junior level 				- operation staff



Database

- Role  Table: level (0,1,2,3) based on the role ID
Level 4 = Highest
Level 3 = Top
Level 2 = middle 
Level 1 = junior


- Approvers only see request from  his/her department


Level 1 =  log’s in to staff page

Level 2 =  log’s in to manager page

Level 3 =  log’s in to admin page

Level 4 =  log’s in to dashboard page



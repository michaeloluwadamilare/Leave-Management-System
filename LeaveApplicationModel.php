<?php include("DbOperationModel.php");?>
<?php
	
	class LeaveApplication extends DbOperation
	{
		//This variable discribes that, this user is exist in database or not .
		var $CreatedOrNot;
		var $check = 0;

		function leaveDue($leaveType) //$applicantUserCodeNumber
		{
			
			$objForLeaveDaysRemain = new DbOperation();
			$result  = $objForLeaveDaysRemain->leaveDaysRemainForOneUser($leaveType);
		
			if (mysql_fetch_array($result) == null)
			{
				$objForLeaveDaysRemain = new DbOperation();
				$leaveTotal  = $objForLeaveDaysRemain->forLeaveDays($leaveType);
				while($rowTotal = mysql_fetch_array($leaveTotal))
				{
					$livTotalLeaveDaysRemain = $rowTotal['totalDays'];
				}
				//echo "From If : TotalLeaveDaysRemain = ".$livTotalLeaveDaysRemain."<br/>";
				return $livTotalLeaveDaysRemain;
			}
			else
			{
				$objForLeaveDaysRemain = new DbOperation();
				$result  = $objForLeaveDaysRemain->leaveDaysRemainForOneUser($leaveType);
				while($row = mysql_fetch_array($result))
				{
					$livTotalLeaveDaysRemain = $row['TotalLeaveDaysRemain'];
				}
				//echo "From Else : TotalLeaveDaysRemain = ".$livTotalLeaveDaysRemain."<br/>";
				return $livTotalLeaveDaysRemain;
			}
		}

		function leaveRequest($leaveType)
		{
			$objDbOperation = new DbOperation();
			$this->check=0;

			$columnsName = "totalLeaveDays";
			//database column name
			$tablesName = "leaveapplicationdetails";
			//database table name
			$conditions = "WHERE appliedStaffId = '".$_SESSION['staff_id']."' AND leaveType = ".$leaveType." AND ( hodApproval = 0 OR hodApproval=1 AND deanApproval =0  OR deanApproval=1 AND ( hrApproval = 0))";
			// conditions, what we want to apply
			$result = $objDbOperation->dbJoinSingleSelect($columnsName,$tablesName,$conditions);
			if(mysql_fetch_array($result) == null)
			{
				$leaveForApply = 0;
				//echo "hi";
			}
			else
			{
				$result1 = $objDbOperation->dbJoinSingleSelect($columnsName,$tablesName,$conditions);
				while($row = mysql_fetch_array($result1))
				{
					$leaveForApply = $row['totalLeaveDays'];
					//echo "hello";
				}
				
			}
			//echo "From Else : TotalLeaveDaysRemain = ".$livTotalLeaveDaysRemain."<br/>";
			return $leaveForApply;
		}

		function leaveDays($leaveType) //$applicantUserCodeNumber
		{
			
			$objForLeaveDaysRemain = new DbOperation();
			$result  = $objForLeaveDaysRemain->forLeaveDays($leaveType);
		
			if (mysql_fetch_array($result))
			{
				$objForLeaveDaysRemain = new DbOperation();
				$leaveTotal  = $objForLeaveDaysRemain->forLeaveDays($leaveType);
				while($rowTotal = mysql_fetch_array($leaveTotal))
				{
					$livTotalLeaveDaysRemain = $rowTotal['totalDays'];
				}
				//echo "From If : TotalLeaveDaysRemain = ".$livTotalLeaveDaysRemain."<br/>";
				return $livTotalLeaveDaysRemain;
			}
		}

		function getAllleaveHistory()
		{
			$objDbOperation = new DbOperation();
			$this->check=0;

			$columnsName = "leaveStart,leaveEnd,totalLeaveDays";
			//database column name
			$tablesName = "leaveapplicationdetails";
			//database table name
			$conditions = "WHERE appliedStaffId = '".$_SESSION['staff_id']."' AND hrApproval = 1 AND seen = 1";
			$result = $objDbOperation->dbJoinSingleSelect($columnsName,$tablesName,$conditions);
			return $result;
		}
	}
	
?>
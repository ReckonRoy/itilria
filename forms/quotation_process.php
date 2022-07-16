<?php
	/**
	 * @Author Le-Roy S. Jongwe
	 * @Date Wednesday 1 December 2022
	 */
	require "../config/connect.php";
	
	ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
 	error_reporting(E_ALL);
 	error_reporting(E_WARNING);
    

	//check if service field isset and not empty 
	if(isset($_POST['service']) && !empty($_POST['service']) && isset($_POST['mode']) && !empty($_POST['mode']))
	{
		//assign service value to a service variable
		$service = ($_POST['service']);
		$mode = $_POST['mode'];
	 	
		//test which service is being requested and further make decision on how to handle request
		
		switch($service)
		{
			case "Web Design":
				if(isset($_POST['serviceType']) && isset($_POST['servicePrice']) && isset($_POST['nop']) && isset($_POST['nopPrice']) && isset($_POST['project_descr']))
				{
					if(!empty($_POST['serviceType']) && !empty($_POST['servicePrice']) && !empty($_POST['nop']) && !empty($_POST['nopPrice']) &&
					 !empty($_POST['project_descr']))
					{
						$serviceType = $_POST['serviceType'];
						$servicePrice = $_POST['servicePrice'];
						$nop = $_POST['nop'];
						$nopPrice = $_POST['nopPrice'];
						$project_description = $_POST['project_descr'];

						echo "All values are as follows: ". $service."\n ".$mode."\n".$serviceType."\n".$servicePrice."\n".$nop." ".$nopPrice." ".$project_description;
						$quoteObject = new processWebdesign($service, $mode, $serviceType, $servicePrice, $nop, $nopPrice, $project_description);
						$quoteObject->runSQL($mysql);
						$mysql->close();

					}else{
						echo "All fields are required!";
					}
				}else{
				echo "some important fields were not set";
				}
			break;

			case "Desktop Application":
				echo "Service Coming soon";
			break;

			case "Android Mobile Application":
				echo "Service coming soon";
			break;

			case "IOS Mobile Application":
				echo "service coming soon";
			break;

			case "Graphic Design":
				echo "service coming soom";
			break;

			case "IT Help Desk":
				echo "service coming soon"; 
			break;
		}
	}	

	class processWebdesign{
		private $serviceName = null;
		private $mode = null;
		private $serviceType = null;
		private $servicePrice = null;
		private $nop = null;
		private $nopPrice = null;
		private $project_description = null;

		function __construct($sn, $m, $st, $sp, $nop, $nop_p, $pd)
		{

			$this->serviceName = $sn;
			$this->mode = $m;
			$this->serviceType = $st;
			$this->servicePrice = $sp;
			$this->nop = $nop;
			$this->nopPrice = $nop_p;
			$this->project_description = $pd;
		}

		function getServiceName()
		{
			return $this->serviceName;
		}

		function getMode()
		{
			return $this->mode;
		}

		function getServiceType()
		{
			return $this->serviceType;
		}

		function getServicePrice()
		{
			return $this->servicePrice;
		}

		function getNOP()
		{
			return $this->nop;
		}

		function getNOPPrice()
		{
			return $this->nopPrice;
		}

		function getProjectDescription()
		{
			return $this->project_description;
		}

		function validateData($form_data)
		{
			//strip tags
			//clear htmlentities
			return htmlentities(strip_tags($form_data));
		}

		function mres($arg1, $sanitized_input)
		{
			return mysqli_real_escape_string($arg1, $sanitized_input);
		}

		function createSQL($mysql_obj)
		{
			$service_name = $this->mres($mysql_obj, $this->validateData($this->getServiceName()));
			$mode = $this->mres($mysql_obj, $this->validateData($this->getMode()));
			$service_type = $this->mres($mysql_obj, $this->validateData($this->getServiceType()));
			$service_price = $this->mres($mysql_obj, $this->validateData($this->getServicePrice()));
			$nop = $this->mres($mysql_obj, $this->validateData($this->getNOP()));
			$nop_price = $this->mres($mysql_obj, $this->validateData($this->getNOPPrice()));
			$project_description = $this->mres($mysql_obj, $this->validateData($this->getProjectDescription()));

			$sql = "INSERT INTO bookings(SERVICE_NAME, MODE, SERVICE_TYPE, SERVICE_PRICE, NOP, NOP_PRICE, PROJECT_DESCRIPTION)
			 VALUES('".$service_name."', '".$mode."', '".$service_type."', '".$service_price."', '".$nop."', '".$nop_price."',
			  '".$project_description."')";
			return $sql;
		}

		function runSQL($mysql)
		{
			$result = $mysql->query($this->createSQL($mysql));
			if($result)
			{
				echo "echo data has been successfuly saved.";
			}else{
				echo "something went terribly wrong please cantact IT support @+27 81 262 4772";
				echo $result->error;
			}
		}
	}
?>
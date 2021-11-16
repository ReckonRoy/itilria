<?php

session_start();
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use \Firebase\JWT\JWT;
use GuzzleHttp\Client;



define('ZOOM_API_KEY', 'W5o6U54PTlOW2a3MoJ10HQ');
define('ZOOM_SECRET_KEY', 'Q9NvRAA0U5fPXKgjNm9cOgYbbyVi8ZgkcJdi');
$temp_key = $_GET['temp_key'];
$time = $_GET['time'];
$name = $_GET['name'];
$emailAddress = $_GET['email'];
$date = $_GET['date'];
	if($_SESSION['zoom_key'])
	{
		if(time()-$_SESSION['request_zoommeeting'] > 24 * 3600) 
		{
			session_unset();
			header("Location:https://itilria.co.za");
		}else{
			//create phpmailer class object
			$email = new PHPMailer(true);
			$zoomMeeting = new ScheduleZoomMeeting($name, $emailAddress, $time, $date, ZOOM_SECRET_KEY, ZOOM_API_KEY);
			$client = new Client(['base_uri' => 'https://api.zoom.us']);
			$zoomMeeting->createZoomMeeting($client);
			$zoomMeeting->meetingScheduledMail($email);
			unset($_SESSION['zoom_key']);
			
		}
	}
class ScheduleZoomMeeting
    {
        private $name = null;    
        private $email = null;
        private $time = null;
        private $date = null;
        private $zoom_secret_key = null;
        private $zoom_api_key = null;
		private $meeting_url = null;
		private $meeting_password = null;
		private $success_message = null;
		private $session_msg = null;
		private $error_message = null;
        function __construct($name, $email, $time, $date, $zoom_secret_key, $zoom_api_key)
        {
            $this->name = $name;
            $this->email = $email;
            $this->time = $time;
            $this->date = $date;
            $this->zoom_secret_key = $zoom_secret_key;
            $this->zoom_api_key = $zoom_api_key;
        }

        public function setMessageServer($message)
        {
            $this->message = $message;
        }

        public function getZoomAccessToken()
        {
            $payload = array(
                "iss" => $this->zoom_api_key,
                'exp' => time() + 3600,
            );

            return JWT::encode($payload, $this->zoom_secret_key);
        }

        public function createZoomMeeting($client)
        {
            //date_default_timezone_set("Africa/Johannesburg");
            $response = $client->request('POST', '/v2/users/me/meetings', [
                "headers" => ["Authorization" => "Bearer ". $this->getZoomAccessToken()
            ],
            'json' => [
                "topic" => "ITilria - Software Development",
                "type" => 2,
                "start_time" => date("Y-m-d\TH:i:s", strtotime($this->date.$this->time)),
                "duration" => "30",
                "password" => "123456"
            ],
            ]);

            $data = json_decode($response->getBody());
			$this->meeting_url = $data->join_url;
			$this->meeting_password = $data->password;
            //echo "Join URL: ". $data->join_url;
            //echo "<br>";
            //echo "Meeting Password: ". $data->password;
        }
        public function getMessageServer()
        {
            return $this->message;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getName()
        {
            return $this->name;
        }

        public function meetingScheduledMail($mail)
        {

            try{
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = "mail.itilria.co.za";
                $mail->SMTPAuth = true;
                $mail->Username = "info@itilria.co.za";
                $mail->Password = "Kv[Beh;E&s=@";
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;

                $mail->setFrom('info@itilria.co.za', 'Admin');
                $mail->addAddress($this->getEmail(), $this->getName());

                $mail->isHTML(true);
                $mail->Subject = "Zoom Meeting Details";
                $mail->Body = <<<html
						<html>
						<body style='background-color:grey'>
						<table align='center' border='0' cellpadding='0' cellspacing='0' width='550' bgcolor='white'
						style='border:2px solid black'>
						<tbody>
						<tr>
						<td align='center'>
						<br />
						<table align='center' border='0' cellpadding='0' cellspacing='0'
						class='c0l-550' width='550'>
						<tbody>
						<tr>
						<td align='center'
						style='background-color: rgb(20, 9, 68);
						height: 50px;
						font-weight: bold;
						font-size: 30px;'>
						<a href='https://itilria.co.za' style='color:white;'>
						<p>ITilria</p>
						</a>
						</td>
						</tr>
						</tbody>
						</table>
						</td>
						</tr>
						<tr style='height: 200px;
						border: none;'>
						<td align='center' style='border: none;
								border-bottom: 2px solid rgb(20, 9, 68);
								padding-left: 20px;
								padding-right: 20px;
								color: gray';>
								<p>
								Hi $this->name, Your zoom meeting has been successfuly scheduled
								Please do remember to attend the meeting on the date you specified.
								</p>
								</td>
								</tr>
								<tr style='height: 150px;
								border: none'>
								<td align='center' style='border: none;
								border-bottom: 2px solid rgb(20, 9, 68);
								padding-left: 20px;
								padding-right: 20px;
								color: gray';>
								<p style='line-height: 2.5em;'>
								Time: $this->time Date: $this->date<br>
								Zoom meeting link and password.
								<p>
								<button style='color: white;
								background-color: green;
								padding: 5px;
								border-radius: 25px;
								font-weight: bold;
								border: 1px solid gray;'><a href='$this->meeting_url' style='color: white;
								text-decoration: none;'>Attend Meeting</a></button></p>
								<p>Your zoom meeting password is: $this->meeting_password</p>
								</p>
								</td>
								</tr>
								<tr style='height: 150px;
								border: none;'>
								<td align='center' style='border: none;'>
								<p align='center'><h2><a href='https://itilria.co.za'>ITilria</a></h2>Home of Software Development & Services you can trust</p>
								<a href="#" style="border:none;
								text-decoration: none; 
								padding: 5px;">linkedin</a>
								<a href="#" style="border:none;
								text-decoration: none; 
								padding: 5px;"> twitter</a>
								<a href="#" style="border:none;
								text-decoration: none;">facebook</a>
								</td>
								</tr>
								</tbody>
								</table>
								</body>
								</html>
						html;
                $mail->AltBody = "Thank you! We have emailed you, your zoom meeting details";
                $mail->send();
				$this->success_message = "Thank you! We have emailed you, your zoom meeting details";
                $this->session_msg = "zoom_success_message";
                $_SESSION[$this->session_msg] = "zoom_success";
                $_SESSION['zoom_message'] = $this->success_message;
            } catch (Exception $e)
            {
				$this->error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                $this->session_msg = "zoom_error_message";
                $_SESSION[$this->session_msg] = "zoom_error";
                $_SESSION['zoom_message'] = $this->error_message;
            }
        }
    }

	class SaveMeeting{
		function save()
		{
			$sql = "INSERT INTO meeting(name, email, time, date) VALUES('".$name."', '".$email."', '".date("h:m", strtotime($time))."', '".$date."')";
			$result = $mysql->query($sql);
		}

	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>ITilria - Zoom Meeting Setup</title>
		<style>
			html, body{
				height: 100%;
			}

			#container{
				display:block;
				width: 100%;
				background-color: white;
				color: gray;
			}

			#main{
				width: 100%;
				padding: 20px 20px;
			}

			#zoom-success{
				background-color: green;
				color: white;
				font-weight: bold;
				height: 100px;
				padding: 10px 0;
				z-index: 1000;
				opacity: 1;
				text-align: center;
				font-family: Verdana, Geneva, Tahoma, sans-serif;
			}
			</style>
	</head>
<body>
	<div id="container">
		<div id="main">
			<?php
				if(isset($_SESSION['zoom_success_message']) && !empty($_SESSION['zoom_success_message']))
				{
			?>
			<div id='zoom-success'>
				<?php echo $_SESSION['zoom_message']; ?>
			</div>
			<script type="text/javascript">
				setTimeout(function(){
				document.getElementById("zoom-success").style.display = "block";
				}, 1500);

				setTimeout(function(){
				window.location.href = "https://itilria.co.za";
				}, 10000);
			</script>
			<?php
				unset($_SESSION['zoom_message']);
				unset($_SESSION['zoom_success_message']);
				}

				if(isset($_SESSION['zoom_error_message']) && !empty($_SESSION['zoom_error_message']))
				{
					echo $_SESSION['message'];
					unset($_SESSION['zoom_message']);
					unset($_SESSION['zoom_error_message']);
				}
			?>
		</div>
	</div>
</body>
</html>
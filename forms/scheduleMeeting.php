<?php
session_start();
    require '../vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['time']) && isset($_POST['date']))
    {
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['time']) && isset($_POST['date']))
        {
            $error = "";
            $name = $_POST['name'];
            //check if name is valid
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
            {
                $error = "Please enter a valid name";
            }

            $emailAddress = $_POST['email'];
            //check if email is valid  
            if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
                $error = $error."\nInvalid email format";
            }

            if(!empty($error))
            {
                echo json_encode([false, "error", $error]); 
            }else{
                $time = $_POST['time']; 
                $date = $_POST['date']; 
                $timelessLimit = date('H:i', strtotime('10:00'));
                $timegreatLimit = date('H:i', strtotime('16:00'));
                //check date validity
                if($date < date('Y-m-d') && $time < date('H:i'))
                {
                    echo json_encode([false, "error", "date and time must not be in the past"]);
                }else if($time < $timelessLimit || $time > $timegreatLimit){
                    echo json_encode([false, "error", "Please note our meetings time schedule is between {$timelessLimit} and {$timegreatLimit}"]);
                }else{   
                    //create phpmailer class object
                    $email = new PHPMailer(true);
                    $zoomMeeting = new ScheduleZoomMeeting($name, $emailAddress, $time, $date);
                    $zoomMeeting->sendConfirmationMail($email);
                }
            }
        }else{
            echo json_encode([false, "error", "Please fill in all fields"]);
        }
    }

    class ScheduleZoomMeeting
    {
        private $name = null;    
        private $email = null;
        private $time = null;
        private $date = null;
        private $success_message = null;
        private $error_message = null;
        private $session_msg = null;
        function __construct($name, $email, $time, $date)
        {
            $this->name = $name;
            $this->email = $email;
            $this->time = $time;
            $this->date = $date;
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

        public function sendConfirmationMail($mail)
        {
            $_SESSION["zoom_key"] = uniqid('zoom_', true); 
            // zoom meeting request time is stored in a session variable
            $_SESSION["request_zoommeeting"] = time();

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
                $mail->Subject = "Confirm Zoom Meeting";
                $mail->Body = <<<html
                <html>
                    <body style='background-color: grey'>

                            <table align='center' border='0' cellpadding='0' cellspacing='0' width='550' bgcolor='white'
                            style='border:2px solid black'>

                                <tbody>
                                    <tr border='0'>
                                        <td align='center'>
                                            <br />
                                            <table align='center' border='0' cellpadding='0' cellspacing='0'
                                            class='c0l-550' width='550'> 
                                                <tbody>
                                                    <tr border='0'>
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
                                                Hi $this->name, We would like you to confirm your Zoom Meeting Schedule below with
                                                the following time and date
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

                                            Click the link below to confirm zoom meeting.
                                            
                                            <br />
                                            <button style='color: white;
                                            background-color: green;
                                            padding: 5px;
                                            border-radius: 25px;
                                            font-weight: bold;
                                            border: 1px solid gray;'><a href='https://itilria.co.za/lib/zoommeeting.php?temp_key=$_SESSION[zoom_key]&name=$this->name&email=$this->email&time=$this->time&date=$this->date' style='color:
                                            white;
                                            text-decoration: none;'>Confirm Meeting Schedule</a></button>
                                            <br />
                                            Please take note link expires after 24 hours. 
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
                                                        text-decoration: none;
                                                        ">facebook</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </body>
                        </html>
            html;
                $mail->AltBody = "Please Confirm Meeting Schedule";
                $mail->send();
                $this->success_message = "Hi {$this->name}. We have sent you a confirmation email to your provided email-address: {$this->email}".
                "\n.Please open the email we sent and confirm your Zoom Meeting Schedule in order to complete the process";
                
                echo json_encode([true, "success", $this->success_message]);;
                
            } catch (Exception $e)
            {
                $this->error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                
                echo json_encode([false, "error", $this->error_message]);
            }
        }
    }
?>

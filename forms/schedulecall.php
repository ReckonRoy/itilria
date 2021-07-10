<?php
session_start();
    require '../vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use \Firebase\JWT\JWT;
    use GuzzleHttp\Client;

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['time']) && isset($_POST['date']))
    {
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['time']) && isset($_POST['date']))
        {
            $error = "";
            $name = $_POST['name'];
            //check if name is valid
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $error = "Please enter a valid name";
              }

            //check if email is valid  
            $emailAddress = $_POST['email'];
            if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
                $error += "<br/>Invalid email format";
            }

            $contact = $_POST['contact'];
            if(!empty($error))
            {
                echo $error;
                
            }else{
                $time = $_POST['time']; 
                $date = $_POST['date']; 
                $timelessLimit = date('H:i', strtotime('10:00'));
                $timegreatLimit = date('H:i', strtotime('16:00'));
                if($date < date('Y-m-d') || $time < date('H:i'))
                {
                    echo "date and time must not be in the past";
                }else if($time < $timelessLimit || $time > $timegreatLimit){
                    echo "Please note our meetings time schedule is between {$timelessLimit} and {$timegreatLimit}";
                }else{   
                    //create phpmailer class object
                    $email = new PHPMailer(true);
                    $zoomMeeting = new ScheduleZoomMeeting($name, $emailAddress,$contact, $time, $date);
                    $zoomMeeting->sendConfirmationMail($email);
                }
            }
             
        }else{
            echo "Please fill in all fields";
        }
    }

    class ScheduleZoomMeeting
    {
        private $name = null;    
        private $email = null;
        private $time = null;
        private $date = null;
        private $contact = null;
        private $success_message = null;
        private $error_message = null;
        private $session_msg = null;
        function __construct($name, $email, $contact, $time, $date)
        {
            $this->name = $name;
            $this->email = $email;
            $this->contact = $contact;
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
            
            // zoom meeting request time is stored in a session variable
            $_SESSION["request_callmeeting"] = time();

            try{
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = "mail.itilria.co.za";
                $mail->SMTPAuth = true;
                $mail->Username = "info@itilria.co.za";
                $mail->Password = "itilriaPJuhi+&}";
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;

                $mail->setFrom('info@itilria.co.za', 'Admin');
                $mail->addAddress($this->getEmail(), $this->getName());

                $mail->isHTML(true);
                $mail->Subject = "Confirm Schedule a call";
                $mail->Body = <<<html
                <html>
                    <body style='background-color: grey'>

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
                                                Hi $this->name, We would like you to confirm your Call Schedule below with
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

                                            Click the link below to confirm call schedule.
                                            
                                            <br />
                                            <button style='color: white;
                                            background-color: green;
                                            padding: 5px;
                                            border-radius: 25px;
                                            font-weight: bold;
                                            border: 1px solid gray;'><a href='https://itilria.co.za/lib/callsetup.php?&name=$this->name&email=$this->email&contact=$this->contact&time=$this->time&date=$this->date' style='color:
                                            white;
                                            text-decoration: none;'>Confirm Call Schedule</a></button>
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
                $this->success_message = "Hi {$this->name}. We have sent you a confirmation email to your provided email-address: {$this->email}.".
                "<br />Please open the email we sent and confirm your Call Meeting Schedule in order to complete the process". 
                
                $this->session_msg = "success_message";
                $_SESSION[$this->session_msg] = "success";
                $_SESSION['message'] = $this->success_message;
                header('Location:https://itilria.co.za');
                
            } catch (Exception $e)
            {
                $this->error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                $this->session_msg = "error_message";
                $_SESSION[$this->session_msg] = "error";
                $_SESSION['message'] = $this->error_message;
                header('Location:http://127.0.0.1/itilria');
            }
        }
    }
?>


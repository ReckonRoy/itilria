<?php
    echo uniqid('zoom_', true);
?>

<html>
<body style='background-color: grey'>

<table align='center' border='0' cellpadding='0' cellspacing='0' width='550' bgcolor='white'
style='border:2px solid black;
border: none;'>

    <tbody>
        <tr border='0' style='border: none;'>
            <td align='center'>
                <br />
                <table align='center' border='0' cellpadding='0' cellspacing='0' style='border:none;'
                class='c0l-550' width='550'> 
                    <tbody>
                        <tr border='0'>
                            <td align='center'
                                style='background-color: rgb(20, 9, 68);
                                height: 50px;
                                font-weight: bold;
                                font-size: 30px;'>
                                <a href='https://www.itilria.co.za' style='color:white;'>
                                <p>ITilria</p>
                                </a>    
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr border='0' style='height: 200px; 
        border: none;'>
            <td align='center' border='0' style='border: none;
            padding-left: 20px;
            padding-right: 20px;
            color: gray';>
                <p>
                    Hi $this->name, We would like you to confirm your Zoom Meeting Schedule below with
                    the following time and date
                </p>
            </td>
        </tr>
        <tr border='0' style='height: 150px;
            border: none;'>
            <td align='center' border='0' style='border: none;
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
                border: 1px solid gray;'><a href='./lib/zoommeeting.php?temp_key=shingai' style='color: white;
                text-decoration: none;'>Confirm Meeting Schedule</a></button>
                <br />
                Please take note link expires after 24 hours. 
                </p>
            </td>
        </tr>
        <tr border='0' style='height: 150px;
        border: none;'>
            <td align='center' border='0' style='border: none;'>

                <p align='center'><h2><a href='https://www.itilria.co.za'>ITilria</a></h2>Home of Software Development & Services you can trust</p>
            
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
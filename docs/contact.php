<?php
    // get data from contact form
    if (isset($_POST['submit'])){
        if(isset($_POST['fullname'])&& isset($_POST['email'])&& isset($_POST['subject'])&& isset($_POST['message'])){
            // Check for empty fields
            if(empty($_POST['fullname'])      ||
                empty($_POST['email'])     ||
                empty($_POST['subject'])     ||
                empty($_POST['message'])   ||
                !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
                {
                echo "No arguments Provided!";
                return false;
            }
            
            // defining variables    
            $name = strip_tags(htmlspecialchars($_POST['fullname']));
            $email = strip_tags(htmlspecialchars($_POST['email']));
            $subject = strip_tags(htmlspecialchars($_POST['subject']));
            $message = strip_tags(htmlspecialchars($_POST['message']));
                
            $handle = fopen('messages.txt','a');
            fwrite($handle, "SENDER'S NAME: ".$name."\n");
            fwrite($handle, "EMAIL ADDRESS: ".$email."\n");
            fwrite($handle, "SUBJECT: ".$subject."\n");
            fwrite($handle, "MESSAGE: ".$message."\n");
            fwrite($handle, "\n\n");
            fclose($handle);
            echo '<script language="javascript" type="text/javascript"> alert("Message Received Successfully!. I will get back to you as soon as possible.");</script>';
            echo '<script language="javascript" type="text/javascript"> window.location="index.html";</script>';
        
            exit;
        }
    }
?>

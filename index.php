<?php
if(isset($_POST['send'])){
	include_once'libraries/autoloader.php';
	$data = [];
	//set the parameter in array
	$postData = ['email' => $_POST['email'],
		'password' => $_POST['password'],
		'message' => $_POST['message'],
		'sender' => $_POST['sender'],
		'recipients' => $_POST['recipients']];
	//send message and get response
	$response = $sms2profit->send($postData);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SMS2Profit Bulk SMS Software SDK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://www.portal.sms2profit.com/favicon.png" type="image/x-icon" rel="icon" />
    <link href="https://www.portal.sms2profit.com/favicon.png" type="image/x-icon" rel="shortcut icon" />
    <meta name="keywords" content="SMS, Bulk-SMS, sms-marketing-software, sms-marketing-solution, online-bulk-sms" />
    <meta name="description" content="This is a Free Bulk SMS Software, or a Free SMS Marketing Software From SMS2Profit, https://www.sms2profit.com"
    />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="https://raw.githubusercontent.com/savanihd/multi-select-autocomplete/master/style.css"/>
    <style>
        body,
        html {
            margin: 0;
            color: #000;
            background-color: #fff;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-style: normal;
            font-variant: normal;
            font-weight: 400;
            line-height: 20px;
        }

        a h1 {
            font-family: Helvetica Neue, Helvetica, sans-serif;
            font-size: 36px;
            font-style: normal;
            font-variant: normal;
            font-weight: 500;
            line-height: 26.4px;
        }

        h3 {
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 20px;
            font-style: normal;
            font-variant: normal;
            font-weight: 500;
            line-height: 15.4px;
        }

        .logo {
            background-image: url();
            background-repeat: no-repeat;
        }

        img.responsive {
            max-height: 80px;
            height: 80px;
            max-width: 80px;
            width: 80px;
        }

        a,
        button {
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
           
            <div class="col-md-6">
                <form id="smsform" accept-charset="utf-8" action="" method="POST">
                    <div class="panel-body">
                        <fieldset>
                            <legend>Send SMS2Profit</legend>
							<?php
							if(isset($response)){
								echo $response['content']; 
								}
								?>
                            <div class="input email required">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" maxlength="50" name="email" required="required" type="email" placeholder="Email" value="<?= (isset($_POST['email']))?$_POST['email']:''?>" />
                            </div>
							  <div class="input password required">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" name="password" required="required" type="password" value="<?= (isset($_POST['password']))?$_POST['password']:''?>" placeholder="Password" />
                            </div>
							 <div class="input text required">  
								<label for="sender">Sender</label>							 
                                <input id="sender" name="sender" class="form-control" maxlength="14"  required="required" type="text" placeholder="Message Sender" value="<?= (isset($_POST['sender']))?$_POST['sender']:''?>" />
                            </div>
                            <div class="input text required"> 
								<label for="recipients">Recipients</label>							
                                <input id="recipients" name="recipients" class="form-control" maxlength="100"  required="required" type="text" placeholder="Message Recipients" value="<?= (isset($_POST['recipients']))?$_POST['recipients']:''?>" />
                            </div>
                                                   
                            <div class="input password required">
							<label for="message">Message</label>
								<textarea id="message" name="message" placeholder="Message To Be Sent " class="form-control"><?= (isset($_POST['message']))?$_POST['message']:''?></textarea>
                           </div>
                        </fieldset>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-info pull-left" type="submit" id="send" name="send">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.min.js"></script>
   
    <!-- CUSTOM SCRIPTS -->
    <script src="js/custom.js"></script>
</body>

</html>

<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();

$errors1=[];

if(isset($_POST['submit'])){

$fields1 =['Name'=> $_POST['name'],'Email'=> $_POST['email'],'Contact Number'=> $_POST['phone'],'Branch'=> $_POST['branch'],'Location'=>$_POST['location']];


$msg = "First line of text\nSecond line of text";

if(empty($fields1['Name'])){
      $errors1[]='The Email field is required.';
}

if(empty($fields1['Contact Number'])){
      $errors1[]='The Contact Number field is required.';
}

if(empty($fields1['Email'])){
      $errors1[]='The Name field is required.';
}

if(empty($errors1)){

           $msg='<p>Hi,<br/><br/><strong>Enquiry Details:</strong><br/><br/>Name  :  '.$fields1['Name'].'<br/>Email  :  '.$fields1['Email'] .' <br/> Contact Number  :  '.$fields1['Contact Number'].'<br/> Branch  :  '.$fields1['Branch'].'<br/> Location  :  '.$fields1['Location'].'<br/></p>';
		
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From:info@globaltree.in'. "\r\n";//enquiry@p2poverseas.com
                $mail=mail('info@globaltree.in,gt.mh.coa@globaltree.in','Purdue University Enquiry',$msg,$headers);

					if($mail){
					echo "Thanks for registration.  We will get back to you soon.";
					session_destroy();
					}
					else{
						echo "Email not sent.";
					}

}
else{
$_SESSION['errors']=$errors1;
$_SESSION['fields']=$fields1;
header('Location:index.php');
}
}
?>
<?
function send_message()
{
	$recipient = $_POST['email'];
	$subject = $_POST['subject'];
	$msg = $_POST['message'];
	$headers = "";

	if(mail("$recipient", "$subject", "$msg", "$headers")):
   		echo "信件已經發送成功。";//寄信成功就會顯示的提示訊息
  	else:
   		echo "信件發送失敗！";//寄信失敗顯示的錯誤訊息
  	endif;
}
?>
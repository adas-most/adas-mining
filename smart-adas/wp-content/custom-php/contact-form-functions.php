<?
function send_message()
{
	$recipient = $_POST['email'];
	$subject = $_POST['subject'];
	$msg = $_POST['message'];
	$headers = "";

	if(mail("$recipient", "$subject", "$msg", "$headers")):
   		echo "�H��w�g�o�e���\�C";//�H�H���\�N�|��ܪ����ܰT��
  	else:
   		echo "�H��o�e���ѡI";//�H�H������ܪ����~�T��
  	endif;
}
?>
<?php

error_reporting(0);

$nome = utf8_encode($_POST['nome']);
$sobrenome = utf8_encode($_POST['sobrenome']);
$matricula = utf8_encode($_POST['matricula']);
$setor = utf8_encode($_POST['setor']);
$diretoria = utf8_encode($_POST['diretoria']);
$telefone = utf8_encode($_POST['telefone']);
$local = utf8_encode($_POST['local']);
$date = utf8_encode($_POST['date']);
$time = utf8_encode($_POST['time']);
$menu = implode(", ",$_POST['menu']);

require  'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->SetLanguage("br");
$mail->isSMTP();

$mail->Host = "smtp.gmail.com";
$mail->Port= "465";
$mail->SMTPSecure = "ssl";
$mail->SMTPAuth= "true";
$mail->CharSet = 'UTF-8';
$mail->Username= "agendat.idmae@gmail.com";
$mail->Password= "@g3nd@Dm@3T.1-2021";

$mail->setFrom($mail->Username,"$nome fez um Agendamento");
$mail->addAddress('agendat.idmae@gmail.com');
$mail->Subject = "Agendamento";

$conteudo_email = "
Olá eu sou, $nome $sobrenome ($matricula) e estou realizando um agendamento para o dia 
<br>
$date as $time, a ser instalado no $local
<br>
Estarei precisando: $menu<br>
Qualquer dúvida ligar no ramal: $telefone.<br>
Desde já Obrigado!";

$mail->IsHTML(true);
$mail->Body = $conteudo_email;

if ($mail->send()){

    echo "Agendamento feito com Sucesso!";

}   else {

    echo "Falha ao enviar o agendamento: ".$mail->ErrorInfo;

}
?>
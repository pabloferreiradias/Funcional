<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$motivo = $_POST['motivo'];
$msg = $_POST['msg'];
$txt = 'Nome: '.$nome.'\n Mensagem: '.$msg;

##---------------------------------------------------
    ##  Envio de Emails pelo SMTP Autênticado usando PEAR
    ##---------------------------------------------------
    # Mais detalhes sobre o PEAR: 
    #   http://pear.php.net/
    #
    # Mais detalhes sobre o PEAR Mail:
    #   http://pear.php.net/manual/en/package.mail.mail-mime.php
    ##---------------------------------------------------
  
    ## OBSERVAÇÃO: Caso deseje um exemplo de como enviar arquivos em anexo,
    ##             gere um script com "Formato do e-mail" igual a "HTML".
  
    # Faz o include do PEAR Mail.
    include ("Mail.php");
  
    # E-mail de destino. Caso seja mais de um destino, crie um array de e-mails.
    # *OBRIGATÓRIO*
    $recipients = 'contato@funcionalstudio.com.br';
  
    # Cabeçalho do e-mail.
    $headers = 
      array (
        'From'    => 'contato@funcionalstudio.com.br', # O 'From' é *OBRIGATÓRIO*.
        'To'      => 'contato@funcionalstudio.com.br',
        'Subject' => $motivo,
        'Date'    => date('r'),
        'Reply-To'=> $email
      );
  
    # Utilize esta opção caso deseje definir o e-mail de resposta
    # $headers['Reply-To'] = 'EMailDeResposta@DominioDeResposta.com';
  
    # Utilize esta opção caso deseje definir o e-mail de retorno em caso de erro de envio
    # $headers['Errors-To'] = 'EMailDeRerornoDeERRO@DominioDeretornoDeErro.com';
    
    # Utilize esta opção caso deseje definir a prioridade do e-mail
    # $headers['X-Priority'] = '3'; # 1 UrgentMessage, 3 Normal  
  
    # Corpo da Mensagem
    $body = $txt;
  
    # Parâmetros para o SMTP. *OBRIGATÓRIO*
    $params = 
      array (
        'auth' => true, # Define que o SMTP requer autenticação.
        'host' => 'smtp.funcionalstudio.com.br', # Servidor SMTP
        'username' => 'contato=funcionalstudio.com.br', # Usuário do SMTP
        'password' => 'contato5535' # Senha do seu MailBox.
      );
      
    # Define o método de envio! queremos 'smtp'. *OBRIGATÓRIO*
    $mail_object =& Mail::factory('smtp', $params);
  
    # Envia o email. Se não ocorrer erro, retorna TRUE caso contrário, retorna um
    # objeto PEAR_Error. Para ler a mensagem de erro, use o método 'getMessage()'.
    $result = $mail_object->send($recipients, $headers, $body);
    if (PEAR::IsError($result))
    {
      echo "<script>alert('Erro ao enviar o e-mail. Tente novamente por favor.');window.location.href='http://'+window.location.hostname+'/contato.html';</script>";
	}   
    else
    {
      echo "<script>alert('E-mail enviado com sucesso!');window.location.href='http://'+window.location.hostname+'/contato.html';</script>";
    }

?>
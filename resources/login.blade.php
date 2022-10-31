<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <title>Login - PDV VendaFácil</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://unpkg.com/balloon-css/balloon.min.css">
        <link rel="icon" type="image/x-icon" href="image/favicon.png">
        <link rel="stylesheet" href="{{asset('css/loginpage.css')}}" type="text/css">
    </head>
    <body>
        <div id="logo_area" style="margin-top: 8vh;">
            <img id="logo_img" src="image/logo.png">
        </div>
        </br>
        <h2 style="font-family: Montserrat, sans-serif; font-size: 3vh;">Acesso ao Sistema</h2>
        <form name="loginform" id="loginform">

        <h3 class="field_label" aria-label="Matrícula de Funcionário ou Usuário" data-balloon-pos="right">Matrícula/Usuário</h3>
		<input type="text" name="log" id="user_login" class="input" value="" size="20" autocapitalize="off" autocomplete="username" required/>
        </br>
        </br>
        <h3 class="field_label">Senha de Acesso</h3>
		<input type="password" name="pwd" id="user_pwd" class="input" value="" size="20" autocapitalize="off" autocomplete="current-password" required />
        </br>
        <input type="checkbox" id="rememberme" style="margin-top: 2vh;"/>
        <label for="rememberme" style="font-family: Montserrat, sans-serif; font-size: 2vh; font-weight: 900;">Mantenha-me conectado</label>
        <p class="submit" align="right">
            <input type="submit" name="wp-submit" id="wp-submit" class="submit_bt" value="Fazer Login" onclick="local.href='admin.html'"/>
            <input type="hidden" name="redirect_to" value="home.html" />
        </p>
        </form>
        <p >
            <a href="mailto:suporte@vendafacil.com?subject=Solicitação de suporte à aplicação&cc=helpdesk@vendafacil.com&body=Por favor, descreva abaixo a sua necessidade de suporte:" style="font-family: montserrat; font-size: 1.7vh; font-weight:900" target="_blank">Entrar em contato com o suporte →</a>
        </p>
        <footer style="font-family: Montserrat, sans-serif; font-size: 1vw; font-weight: bold;">Todos os direitos registrados - VendaFácil © 2022</footer>
    </body>
</html>

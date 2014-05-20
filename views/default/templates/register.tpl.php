<h1>Registro de novo usuario</h1>
<form action="useraccount/register-user" method="post">
    Nome: <input type="text"  name="user_name" /><br />
    Sobrenome: <input type="text" name="user_surname" /><br />
    Nome do Usuario: <input type="text" name="user_username" /><br />
    Senha: <input type="password" name="user_password" /><br />
    Confirme sua senha: <input type="password"  name="user_password_confirm" /><br />
    <input type="hidden" value="1" name="reg_flag"/>
    <input type="submit"  value="Registrar" name="" />
</form>

<a href="{{ $empresa->urlPadrao }}/admin">Fazer login</a>

<table align="center" border="0" cellpadding="25" cellspacing="0" width="550">
    {{--  <tr>
        <td align="center" height="120">
            <img src="https://app.esocialbrasil.com.br/images/logo-esocial-brasil-color.svg" height="55" />
        </td>
    </tr>  --}}

    <tr>
        <td height="120" align="center" style="color: #0061b9; font-family: Arial, sans-serif; font-size: 25px;" bgcolor="#f4f6f9">
            <strong>Você foi cadastrado como vendedor da loja {{ $empresa->nome }}</strong>
        </td>
    </tr>

    <tr>
        <td align="center" style="color: #777777; font-family: Arial, sans-serif; line-height: 2; font-size: 14px;">
            Abaixo estão seus dados de acesso: <br>
            E-mail: <strong>{{ $user->email }}</strong><br>
            Senha: <strong> {{ $senha }}</strong><br>
            <a href="{{ $empresa->urlPadrao }}/admin" style="color:#0061b9; text-decoration:none;"><strong>FAZER LOGIN</strong></a>
        </td>
    </tr>

    <tr>
        <td align="center" height="80" bgcolor="#0061b9" style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px; line-height: 1.5; link:#ffffff;">
            Visite nossa <a href="https://estoqueintegrado.com.br" style="color:#dddddd; text-decoration:none;" target="_blank">Página principal</a><br>
        </td>
    </tr>
</table>

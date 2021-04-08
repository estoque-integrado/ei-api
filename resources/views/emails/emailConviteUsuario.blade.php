<h2>Você recebeu um convite!</h2>

<p>
    Olá, {{ $user->nome }}!
    A empresa <strong> {{ $empresa->nome }} </strong> enviou um convite para você ajudar na gestão de empresa(s) no Estoque Integrado.

    <p>Empresa(s):</p>
    @foreach ($empresas as $empresaTemp)
        <p>→ {{ $empresaTemp->nome }}</p>
    @endforeach
</p>
<p>Para aceitar ou recusar o convite, clique no link abaixo e em seguida complete seu cadastro.</p>

<a href="{{ route('aceitarConviteUsuarioEmpresa', [base64_encode($user->email)]) }}">Aceitar convite</a> <br><br>

Caso não consiga clicar, copie o link abaixo e cole no seu navegador: <br>

{{ route('aceitarConviteUsuarioEmpresa', [base64_encode($user->email)]) }}
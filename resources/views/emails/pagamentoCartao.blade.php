@extends('emails.emails')
@section('content')
    <p>Olá, {{ $user->nome }}!</p>
    <p>Falta pouco para você começar a vender online!</p>
    <p>Seu pagamento foi confirmado!</p>
    <p>você pode entrar no seu painel e usufruir de todos os recursos de forma ilimitada.</p>
    <div style="text-align: center;">
        <a
            itemprop="url"
            href="{{ $empresa->urlPadrao }}/admin"
            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #1CD1C4; margin: 0; border-color: #1CD1C4; border-style: solid; border-width: 8px 16px;"
        >Ir para o painel</a>
    </div>
 @endsection

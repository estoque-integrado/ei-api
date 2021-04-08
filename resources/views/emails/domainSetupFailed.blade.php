@extends('emails.emails')
@section('content')
    <p>Olá, {{ $item->empresa->proprietario->nome }}!</p>
    <p>Infelizmente não conseguimos identificar suas configurações de domínio.</p>
    <p>Recomendamos que você revise as informações de configuração e tente novamente.</p>
    <div style="text-align: center;">
        <a
            style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #1CD1C4; margin: 0; border-color: #1CD1C4; border-style: solid; border-width: 8px 16px;"
            href="{{ $item->empresa->urlPadrao }}/app/configuracoes/dominio"
            class="btn-primary"
            itemprop="url"
        >Gerenciar configurações</a>
    </div>
 @endsection

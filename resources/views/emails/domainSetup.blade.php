@extends('emails.emails')
@section('content')
    <p>Olá, {{ $item->empresa->proprietario->nome }}!</p>
    <p>Identificamos que a configuração do seu domínio já está funcionando!</p>
    <p>Você pode utilizar sua loja normalmente através do seu endereço personalizado: {{ $item->empresa->urlPadrao }}</p>
    <div style="text-align: center;">
        <a href="{{ $item->empresa->urlPadrao }}" class="btn-primary" itemprop="url" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #1CD1C4; margin: 0; border-color: #1CD1C4; border-style: solid; border-width: 8px 16px;">Visitar minha loja</a>
    </div>
 @endsection

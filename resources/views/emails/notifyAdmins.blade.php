@extends('emails.emails')
@section('content')
    <p style="margin-bottom: 20px;">Uma nova loja foi criada no Estoque Integrado. 🎉</p>
    <p style="margin-bottom: 5px;"><strong>Dados do usuário:</strong></p>
    <strong>Nome:</strong> {{ $user->nome }}<br>
    <strong>E-mail:</strong> {{ $user->email }}<br>
 @endsection

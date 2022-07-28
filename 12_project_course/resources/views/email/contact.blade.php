@component('mail::message')

Olá, você recebeu um novo contato a partir do seu site.

Nome: <b>{{ $reply_name }}</b>

E-mail: {{ $reply_mail }}

Assunto: {{ $subject }}

Mensagem:
@component('mail::panel')
    {{ $message }}
@endcomponent

@endcomponent

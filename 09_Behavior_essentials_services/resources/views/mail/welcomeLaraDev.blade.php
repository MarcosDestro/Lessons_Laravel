@component('mail::message')
# Parabéns por garantir sua vaga na turma laraDev

> Para fazer o login na plataforma utilize o seu email ({{ $user->mail }}) juntamente com a senha cadastrada.

@component('mail::button', ['url'=>'https://www.upinside.com.br'])
    Garantir minha vaga!
@endcomponent

Para garantir a sua vaga, você tem até o dia {{ date('d/m/Y', strtotime($order->due_at)) }} para conseguir o desconto e pagar somente R${{ number_format($order->value, 2, ',', '.') }} e ter acesso completo ao nosso conteúdo!
@endcomponent


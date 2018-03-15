<p>@lang('Olá :name, seja bem vindo ao portal da HSC Brasil', ['name' => $model->name]).</p>
<br />
<br />
<p></p>
<p>@lang('Portal'): {{ url('/') }}</p>
<p>@lang('Usuário'): {{ $model->email }}</p>
<p>@lang('Senha'): {{ $password }}</p>
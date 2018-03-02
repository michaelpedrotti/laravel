Product-Name = {{ $model->Product->name }}
Registered-To = {{ $model->Custumer->User->name }}
Expires = {{ app_date($model->expiration_app, 'Y-m-d', 'd-M-Y') }}
Host-ID = {{ $model->zend_id }}
Hardware-Locked = Yes
Licence-Type = {{ $model->Type->val }}
Version = {{ $filepath }}
@if($model->uid == 'iss')
msn = 0
wct = {{ $model->count }}
Catalogs = 0 - Não possui / Formato YYYY-MM-DD
@elseif($model->uid == 'mli')
Users = {{ $model->count }}
DLP = 1
@endif
@foreach($model->Attributes as $attr)
{{ $attr->ProductAttr->key }} = {{ $attr->ProductAttr->default }}
@endforeach
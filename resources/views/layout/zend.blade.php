Product-Name = {{ $model->Product->name }}
Registered-To = {{ $model->Custumer->User->name }}
Expires = {{ app_date($model->expiration_app, 'Y-m-d', 'd-M-Y') }}
Host-ID = {{ $model->zend_id }}
Hardware-Locked = Yes
Licence-Type = {{ $model->Type->val }}
Users = {{ $model->count }}
@if($model->uid == 'iss')
msn = 0
wct = {{ $model->count }}
Catalogs = {{ $model->expiration_app }}
@elseif($model->uid == 'mli')
DLP = 1
@endif
@foreach($model->Attributes as $attr)
{{ $attr->ProductAttr->key }} = {{ $attr->ProductAttr->default }}
@endforeach

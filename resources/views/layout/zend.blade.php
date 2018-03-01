Product-Name = {{ $model->Product->name }}
Registered-To = {{ $model->Custumer->User->name }}
Expires = {{ app_date($model->expiration_app, 'Y-m-d', 'd-b-Y') }}
Host-ID = {{ $model->zend_id }}
Hardware-Locked = Yes
Licence-Type = 3
Version = /opt/hsc/keys/iss-3.x.key
@if($model->uid == 'iss')
msn = 0
wct = {{ $model->count }}
Catalogs = 0 - Não possui / Formato YYYY-MM-DD
@elseif($model->uid == 'mli')
Users = {{ $model->count }}
DLP = 1
@endif
@foreach($model->LicenseAttrs as $attr)
{{ $attr->ProductAttr->key }} = {{ $attr->ProductAttr->default }}
@endforeach

# ISS 4.0
#DynamicContentCache = 1/0 # enabled when License-Type== 2
#AnywhereProtection =  1/0 # enabled when License-Type== 2

# MLI
#Licence-Type = 1 - Network, 2 - Enterprise, 3 - ISP

<b>Bonjour mr (s) {{$name}} voici votre données d'accès</b><br>
Email : {{$email}}<br>
mot de passe : <b>@if($password!=''){{$password}} @else Mot de passe c'est le même vieux @endif</b>
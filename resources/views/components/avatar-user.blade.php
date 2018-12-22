<div>
@if ($reponse == false )
    <img src="./images/avatars_users/default.jpg">
@else <img src="./images/avatars_submit/{{Auth::user()->avatar->imageUrl}}" style="@isset($style)@else('...')@endisset">
@endif
</div>

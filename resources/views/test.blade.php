<?php
//$user = \App\User::find(9);
//$user->password = bcrypt('12345');
//$user->update();
?>
@if(isset($user))
    <div>
        {{ $user }}
    </div>
@endif
<div>
    <p>Bienvenido '{{ $user->name }}', al presionar el siguiente link se activará tu cuenta.</p>
    <p><a href="{{ route('active', $user->token) }}">Link</a></p>
    <p>Saludos,</p>
    <p>Equipo de Gestión Contractual.</p>
</div>
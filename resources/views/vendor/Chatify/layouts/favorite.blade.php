<div class="favorite-list-item">
    <div data-contact="{{ strtolower($user->uid) }}" data-contact-id="{{ $user->id }}" data-action="0" class="avatar av-m" style="background-image: url('{{ src($user->avatar) }}');">
    </div>
    <p>{{ strlen($user->username) > 5 ? substr($user->username,0,6).'..' : $user->username }}</p>
</div>

<div class="media">
    <a class="float-left" href="#">
        <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"
             alt="{{ $message->user->name }}" class="img-circle">
    </a>
    <div class="media-body">
        <p class="font-weight-bold pl-2">{{ $message->user->name }}</p>
        <p class="font-weight-bold pl-2">{{ $message->body }} <small  class="text-muted mt-0">Posted {{ $message->created_at->diffForHumans() }}</small></p>
    </div>
</div>
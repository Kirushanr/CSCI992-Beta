<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<a href="{{ route('user-messages.show', $thread->id) }}" style="text-decoration: none">
<div class="card" style="width: 18rem;">
        <div class="card-header {{$class}}">
                {{ $thread->subject }}
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><span class="badge badge-primary font-weight-bold">{{ $thread->userUnreadMessagesCount(Auth::id()) }} unread message</span></li>
          <li class="list-group-item">Sent by:</strong> {{ $thread->creator()->name }}</li>
        </ul>
</div>
</a>
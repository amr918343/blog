{{-- broadcast scripts --}}
<script>
    window.App = {!! json_encode([
    'user' => auth()->check() ? auth()->user()->id : null,
]) !!};
</script>
<script>
    window.laravel_echo_port = '{{ env('LARAVEL_ECHO_PORT') }}';
</script>
<script src="//{{ Request::getHost() }}:{{ env('LARAVEL_ECHO_PORT') }}/socket.io/socket.io.js"></script>
<script src="{{ url('/js/laravel-echo-setup.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'X-Socket-Id': window.Echo.socketId()
        }
    });
    var creatorId = $('#creator_id').data('id');
    // Listen to CommentNotification event
    window.Echo.channel(`comment-notification.` + creatorId)
        .listen(".CommentNotification", (data) => {
            let i = 0;
            let newNotification =
                `<a id="notificationAucune" class="dropdown-item dropdown-notification" href="http://127.0.0.1:8000/post/` +
                data.postSlug + `"><p class="notification-solo text-center">` +
                data.userName + ` has commented on your post.</p></a>`;
            $("#notification_container").append(newNotification);
        });
</script>

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
    // Listen to PostNotification event
    let i = 0;
    window.Echo.channel('post-notification')
        .listen('.PostNotification', (data) => {
            i+= 1;
            let counterContainer = `<span id="notificationsBadge" class="badge badge-danger">` + i + `</span>`
            let newNotification =
                `<a id="notificationAucune" class="dropdown-item dropdown-notification" href="http://127.0.0.1:8000/post/` +
                data.postSlug + `"><p class="notification-solo text-center">` +
                data.userName + ` shared a post</p></a>`;
            $("#notification_container").append(newNotification);
            // if i > 0 show notification counter
            if (i > 0)
                $("#notification_counter").html(counterContainer);
        });

    // window.Echo.private('comment-notification')
    //     .listen('.CommentNotification', (data) => {
    //         var newNotification =
    //             `<a id="notificationAucune" class="dropdown-item dropdown-notification" href="http://127.0.0.1:8000/post/` +
    //             data.postSlug + `"><p class="notification-solo text-center">` +
    //             data.userName + ` has commented on your post.</p></a>`;
    //         $("#notification_container").append(newNotification);
    //     });
</script>

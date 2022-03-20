<script>
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function like() {
            var btnDanger = $('#btn-like').hasClass('btn-danger');

            if (btnDanger) {
                btnDanger = false;
                $("#btn-like").toggleClass("btn-danger btn-outline-danger");
            } else {
                btnDanger = true;
                $("#btn-like").toggleClass("btn-outline-danger btn-danger");
            }

            var isLiked = 0;
            if (btnDanger) {
                isLiked = 1;
            }
            var likeRequest = {
                "status": isLiked,
                "user_id": $('#user_id').val(),
                "post_id": $('#post_id').val(),
            };
            $.ajax({
                type: "post",
                url: "{{ route('post.like.store') }}",
                data: likeRequest,
                success: function(data) {
                    document.getElementById('likes_count').innerText = "Likes: " + data;

                },
                error: function(reject) {
                    console.log("error: " + reject);
                }
            });
        }
</script>

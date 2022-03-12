<script>
    
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function comment() {
            
            
            var commentRequest = {
                "body": $('#body').val(),
            };
            
            $.ajax({
                type: "post",
                url: "{{ route('post.comment.store', $post->id) }}",
                data: commentRequest,
                success: function(data) {
                    $('#body').val(` `);
                    $('#comment_error').html(``);
                    $('#comments-container').append(`<div class="d-flex flex-column comment-section mt-2" style="border: 1px dashed #007bff">
                                                        <div class="bg-white p-1">
                                                            <div class="d-flex flex-row user-info">
                                                                <img class="rounded-circle mx-2" 
                                                                src="{{ asset('images/post/marshallIcon.jpg') }}" 
                                                                style="width: 40px">
                                                                <div class="d-flex flex-column justify-content-start ml-2">
                                                                <span class="d-block font-weight-bold name">` +
                                                                    data.commentUserName +
                                                                `</span>
                                                                <span class="date text-black-50">` +
                                                                    data.commentCreatedAt +
                                                                `</span>
                                                            </div>
                                                        </div>
                                                        <p class="comment-text text-center">` +
                                                            data.commentBody +
                                                        `</p>
                                                    </div>`);
                    // scroll to created comment
                    $('html, body').animate({
                        scrollTop: $(document).height()
                    }, 'slow');
                },
                error: function(reject) {
                    $('#comment_error').html(
                        `<strong><small class="text-danger">Comment field is required</small></strong>`
                    );
                }
            });
        }
</script>
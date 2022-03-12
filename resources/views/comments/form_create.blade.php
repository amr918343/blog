<div class="create-form-container w-100" style="display: flex; flex-direction:column">
    <form id="form_create_comment" class="d-flex flex-column">
        <textarea id="body" class="form-control shadow-none textarea" name="body" required="required"></textarea>
        <span id="comment_error"></span>
    </form>
    <button id="btn_create_comment" class="btn btn-primary btn-sm shadow-none mt-2" style="align-self: flex-start" onclick="comment()">Add comment</button>
</div>

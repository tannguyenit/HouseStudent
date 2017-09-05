function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#previewHolder').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#update_logo").change(function() {
    readURL(this);
});

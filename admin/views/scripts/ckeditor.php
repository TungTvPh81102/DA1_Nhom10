<script src="<?= BASE_URL ?>assets/admin/libs/ckeditor/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#ckeditor'), {
        ckfinder: {
            uploadUrl: 'fileupload.php'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
ClassicEditor
    .create(document.querySelector('#ckeditor2'), {
        ckfinder: {
            uploadUrl: 'fileupload.php'
        }
    })
    .then(editor => {
        console.log(editor);
    })
    .catch(error => {
        console.error(error);
    });
</script>
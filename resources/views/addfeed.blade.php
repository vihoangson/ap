@extends('layouts.app2')
@section('BodyContent')
    <div class="text-center">
        <div><img src="" id="img" class="d-none"></div>
        <input type="file" id="sortpicture" class="d-none">
        <button class="btn btn-info" id="upload">UPLOAD</button>
        <div>
            <input type="hidden" id="upload_id">
            <input type="text" id="textfeed" class="form-control" placeholder="How is your feeling  ?" >
        </div>
        <div>
            <button class="btn btn-primary" onclick="submitForm()">SAVE</button>
        </div>
    </div>
@endsection
@section('FooterContent')
    <script>

        function submitForm() {
            var textfeed = $('#textfeed').val();
            var form_data = new FormData();
            form_data.append('content', textfeed);
            form_data.append('upload_id', 1);
            $.ajax({
                url: '/api/feed', // <-- point to server-side PHP script
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: (php_script_response) => {
                    php_script_response = JSON.parse(php_script_response);
                }
            });
        }

        $('#upload').on('click', () => {
            $("#sortpicture").click();
        });
        $("#sortpicture").change(uploadFile);
        function uploadFile() {
            var file_data = $('#sortpicture').prop('files')[0];
            var textfeed = $('#textfeed').val();
            var form_data = new FormData();
            form_data.append('file', file_data);
            $.ajax({
                url: '/api/upload', // <-- point to server-side PHP script
                dataType: 'text',  // <-- what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: (php_script_response) => {
                    php_script_response = JSON.parse(php_script_response);
                    $("#img").attr('src', '/storage/files/' + php_script_response.filename + '/' + php_script_response.filename);
                    $("#upload_id").val(php_script_response.id)
                    $("#img").removeClass('d-none');
                }
            });
        }
    </script>
@endsection

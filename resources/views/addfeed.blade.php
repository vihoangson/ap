@extends('layouts.app1')
@section('BodyContent')
    <div class="text-center">
        <div><img src="" id="img" class="d-none"></div>
        <input type="file" id="sortpicture" class="d-none">
        <button class="btn btn-info" id="upload">UPLOAD</button>
    </div>
@endsection
@section('FooterContent')
    <script>
        $('#upload').on('click', () => {
            $("#sortpicture").click();
        });
        $("#sortpicture").change(uploadFile);

        function uploadFile() {
            var file_data = $('#sortpicture').prop('files')[0];
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
                    $("#img").removeClass('d-none');
                    alert(php_script_response); // <-- display response from the PHP script, if any
                }
            });
        }
    </script>
@endsection

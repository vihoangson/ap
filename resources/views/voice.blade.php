<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        #record {
            background-color: red; /* Green */
            border-width: medium;
            border-color: black;
            color: white;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            max-width: 50%;
            max-height: 15%;
            border-radius: 50%;
            left: 100px;
            right: 100px;
            position: relative;
        }

        #stopRecord {
            background-color: green; /* Green */
            border-width: medium;
            border-color: black;
            color: white;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            max-width: 50%;
            max-height: 15%;
            border-radius: 50%;
            left: 100px;
            right: 100px;
            position: relative;
        }

        h2 {
            left: 100px;
            position: relative;
        }

        #recordedAudio {
            left: 100px;
            right: 100px;
            position: relative;
        }
    </style>
</head>

<body style="background-color:rgb(101, 185, 17); ">

<button onclick='startStreamedAudio()'>1</button>
<button onclick='stopStreamedAudio()'>2</button>
<button onclick='uploadAudio()'>3</button>
<audio id="wavSource" type="audio/wav" controls></audio>
<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
<script>

    let chunks = []; //will be used later to record audio
    let mediaRecorder = null; //will be used later to record audio
    let audioBlob = null;
    document.getElementById("wavSource").style.display = 'none';
    function stopStreamedAudio() {
        mediaRecorder.stop();
    }

    function startStreamedAudio() {
        navigator.mediaDevices.getUserMedia({
            audio: true,
        })
            .then((stream) => {
                mediaRecorder = new MediaRecorder(stream);
                mediaRecorder.start();
                mediaRecorder.ondataavailable = (e) => {
                    chunks.push(e.data);
                };
                mediaRecorder.onstop = () => {
                    let stream = mediaRecorder.stream;
                    let tracks = stream.getTracks();

                    tracks.forEach((track) => {
                        track.stop();
                    });
                    document.getElementById("wavSource").style.display = 'block';
                    let audioBlob = new Blob(chunks, {type: 'audio/wav'});
                    let blobURL = window.URL.createObjectURL(audioBlob);
                    document.getElementById("wavSource").src = blobURL;
                    document.getElementById("wavSource").play();
                    //reset to default
                    mediaRecorder = null;
                    //chunks = [];

                };
            })
            .catch((err) => {
                alert(`The following error occurred: ${err}`);
            });
    }
    function uploadAudio(){
        let audioBlob = new Blob(chunks, {type: 'audio/wav'});
        sendData(audioBlob);
        document.getElementById("wavSource").style.display = 'none';
        chunks = [];
    }

    function sendData(data) {
        var fd = new FormData();
        fd.append('filename', 'test.wav');
        fd.append('file', data);
        $.ajax({
            type: 'POST',
            url: '/api/upload',
            data: fd,
            processData: false,
            contentType: false
        }).done(function (data) {
            console.log(data);
        });
    }
</script>
</body>

</html>

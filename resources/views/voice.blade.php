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

<h2>Record</h2>
<p>
    <button id=record></button>
    <button id=stopRecord disabled>Stop</button>
</p>
<p>
    <audio id=recordedAudio></audio>

</p>
<script
    src="https://code.jquery.com/jquery-2.2.4.min.js"
    integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
    crossorigin="anonymous"></script>
<script>
    navigator.mediaDevices.getUserMedia({audio:true})
        .then(stream => {handlerFunction(stream)})


    function handlerFunction(stream) {
        rec = new MediaRecorder(stream);
        rec.ondataavailable = e => {
            audioChunks.push(e.data);
            if (rec.state == "inactive"){
                let blob = new Blob(audioChunks,{type:'audio/wav'});
                recordedAudio.src = URL.createObjectURL(blob);
                recordedAudio.controls=true;
                recordedAudio.autoplay=true;
                sendData(blob)
            }
        }
    }
    var form = new FormData();
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
        }).done(function(data) {
            console.log(data);
        });
    }

    record.onclick = e => {
        console.log('I was clicked')
        record.disabled = true;
        record.style.backgroundColor = "blue"
        stopRecord.disabled=false;
        audioChunks = [];
        rec.start();
    }
    stopRecord.onclick = e => {
        console.log("I was clicked")
        record.disabled = false;
        stop.disabled=true;
        record.style.backgroundColor = "red"
        rec.stop();


    }
</script>
</body>

</html>

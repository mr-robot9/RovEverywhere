@extends('layouts.app')
@section('scripts')
  <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection

@section('content')

  <style>
    .liveStream{
      background:url('/images/loader.gif') center center no-repeat;
    }

    #forward{
      /* border-top-left-radius: 25px;
      border-top-right-radius: 25px;
      border-top: solid;
      border-left: solid;
      border-right: solid; */
      position:absolute;
      right: 110px;
      bottom: 290px;
      padding-left: 10px;
      padding-right: 10px;
      padding-bottom: 10px;
      opacity: 0.5;


    }
    #left{
      /* border-top-left-radius: 25px;
      border-bottom-left-radius: 25px;
      border-top: solid;
      border-left: solid;
      border-bottom: solid; */
      position:absolute;
      bottom: 205px;
      right: 193px;
      padding-top: 10px;
      padding-bottom: 10px;
      padding-right: 25px;
      opacity: 0.5;

    }
    #pwm{
      border-radius: 10px;
      position:absolute;
      bottom: 220px;
      right: 105px;
      font-size: 30px;
      opacity: 0.5;

    }
    #right{
      /* border-top-right-radius: 25px;
      border-bottom-right-radius: 25px;
      border-top: solid;
      border-right: solid;
      border-bottom: solid; */
      position:absolute;
      bottom: 205px;
      right: 25px;
      padding-top: 10px;
      padding-bottom: 10px;
      padding-left: 25px;
      opacity: 0.5;

    }
    #reverse{
      /* border-bottom-left-radius: 25px;
      border-bottom-right-radius: 25px;
      border-bottom: solid;
      border-left: solid;
      border-right: solid; */
      position:absolute;
      right: 110px;
      bottom: 135px;
      padding-top: 10px;
      padding-left: 10px;
      padding-right: 10px;
      opacity: 0.5;



    }
    #panLeft {
      position:absolute;
      right: 150px;
      top: 50px;
      opacity: 0.5;
    }

    #panRight {
      position:absolute;
      right: 70px;
      top: 50px;
      opacity: 0.5;

    }
    #panTiltNeutral {
      position:absolute;
      right: 110px;
      top: 50px;
    }
    #tiltLeft {
      position: absolute;
      right: 110px;
      top: 10px;
      opacity: 0.5;

    }
    #tiltRight {
      position: absolute;
      right: 110px;
      top: 90px;
      opacity: 0.5;

    }

    #takepic{
      position: relative;
      border-radius: 10px;
      left: 8px;
      top: -540px;
      opacity: 0.5;
    }
    #phrase{
      border-radius: 10px;
      position:absolute;
      bottom: 140px;
      left: 25px;
      font-size: 40px;
      opacity: 0.5;
      width: 40%;
      height: 60px;
    }
    #speak{
      border-radius: 10px;
      position:absolute;
      bottom: 140px;
      left: 482px;
      opacity: 0.5;
    }
    #honk{
      position: relative;
      border-radius: 10px;
      left: 8px;
      top: -540px;
      opacity: 0.5;
    }
    #lightsOn{
      position: relative;
      border-radius: 10px;
      left: 8px;
      top: -540px;
      opacity: 0.5;
    }
    #lightsOff{
      position: relative;
      border-radius: 10px;
      left: 8px;
      top: -540px;
      opacity: 0.5;
    }
    #btnPicker{
      position: relative;
      border-radius: 10px;
      left: 8px;
      top: -540px;
      opacity: 0.5;
    }
    #colorBox{
      position: relative;
      border-radius: 10px;
      left: 8px;
      top: -540px;
      opacity: 0.5;
    }
    #rangePicker{
      position: relative;
      border-radius: 10px;
      right: 120px;
      top: -380px;
      transform: rotate(270deg);
    }
    #rangeValue{
      position: relative;
      border-radius: 10px;
      top: -420px;
      left: 50px;
      color: white;

    }

  </style>

<div class="container" >

    <div class="col-md-12">
      <iframe class="liveStream" src="http://192.168.12.1:9090/stream" frameborder="0" align="middle" width="100%" height="550" align="middle" scrolling="no"></iframe>
      <button id="takepic" class="fas fa-camera" style="font-size: 50px; width: 100px;"></button>
      <button id="honk" class="fas" style="font-size: 50px; width: 100px;"><img style="height: 45px"src="/images/honkRover.png"></button>
      <button id="lightsOn" class="fas" style="font-size: 50px; width: 100px;"><img style="height: 45px"src="/images/lighton.png"></button>
      <button id="lightsOff" class="fas" style="font-size: 50px; width: 100px;"><img style="height: 45px"src="/images/lightoff.png"></button>
      <input  id="btnPicker" class="jscolor {onFineChange:'update(this)'}" value="FFFFFF" type="button">
      <span id="colorBox"> R, G, B = <span id="rgb"></span> </span>

      <input id="rangePicker" style=" width: 300px" min="1" max="100" value="50" type="range"/>
      <h3 id="rangeValue"></h3>
      <a href="#" id="forward" ><img style="height: 60px; width: 60px;"src="/images/forward.png"></a>
      <a href="#" id="left" ><img style="height: 60px; width: 60px;"src="/images/left.png"></a>
      <input class="col-md-1" type="number" value="50" min="50" max="254" id="pwm">
      <a href="#" id="right" ><img style="height: 60px; width: 60px;"src="/images/right.png"></a>
      <a href="#" id="reverse" ><img style="height: 60px; width: 60px;"src="/images/reverse.png"></a>


      <a href="#" id="panLeft" style="height: 35px; width: 35px"><img style="height: 25px"src="/images/left.png"></a>
      <a href="#" id="panTiltNeutral" style="height: 35px; width: 35px"><img style="height: 25px"src="/images/neutral.png"></a>
      <a href="#" id="panRight" style="height: 35px; width: 35px"><img style="height: 25px"src="/images/right.png"></a>
      <a href="#" id="tiltLeft" style="height: 35px; width: 35px"><img style="height: 25px"src="/images/forward.png"></a>
      <a href="#" id="tiltRight" style="height: 35px; width: 35px"><img style="height: 25px"src="/images/reverse.png"></a>
      <input id="phrase" type="text" class="form-control" maxlength="25"/>
      <button id="speak" class="btn" style="font-size: 30px;">Speak</button>

      <input type="hidden" value="1500" id="freq">
      <input type="hidden" value="1400" id="tiltFreq">
    </div>

    <div id="confirmScreenshot" class="modals">

        <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <h3 style="text-align:center;">Screenshot Taken!</h3>
          </div>

  </div>
</div>
<script src="{{ asset('js/jscolor.js') }}"></script>
  <script>
  //-- Section for Color Picker ---------------//
  function update(picker) {
        document.getElementById('rgb').innerHTML =
            Math.round(picker.rgb[0]) + ', ' +
            Math.round(picker.rgb[1]) + ', ' +
            Math.round(picker.rgb[2]);
  }

  $(document).ready(function(){
    $("#rangeValue").text(50);
    $("#rangePicker").on('change', function() {
      $("#rangeValue").text(this.value);
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //-- Section for speaking ---------------//
    $("#speak").click(function(){
      var phrase = $("#phrase").val();
      var range = $("#rangePicker").val();
      $.ajax({
        url: '/features/speak/{phrase}/{range}',
        type: 'POST',
        data: {phrase: phrase, range: range},
        success: function(response){
          console.log(response);
        }

      });

    });

//---------------  This section is used for turning led lights on. -------------//
$("#lightsOn").on("click", function() {
      var picker = document.getElementById('btnPicker').jscolor;
      var rgbColor =
            Math.round(picker.rgb[0]) + ' ' +
            Math.round(picker.rgb[1]) + ' ' +
            Math.round(picker.rgb[2]);
        $.ajax({
          url: '/features/lightsOn/{rgb}',
                        type: 'GET',
                        data: { rgb: rgbColor },
                        success: function(response)
                        {
                            console.log(response);
                        }

        });
      });

$("#lightsOff").on("click", function() {
        $.ajax({
          url: '/features/lightsOff',
                        type: 'GET',
                        success: function(response)
                        {
                            console.log(response);
                        }

        });
      });

//---------------  This section is used for honking the horn. -------------//
$("#honk").click(function() {
      $.ajax({
         url: '/features/honkSound',
                         type: 'GET',
                         success: function(response)
                         {
                             console.log(response);
                         }
         });
    });

//---------------  This section is used for playing audio on the pi. -------------//


    $("#playSound").click(function() {
      $.ajax({
         url: '/features/playSound',
                         type: 'GET',
                         data: { mp3Files: getSelect() },
                         success: function(response)
                         {
                             console.log(response);

                         }
         });
    });

//---------------  This section is used for calling moving functions on the camera. -------------//

      $("#stop").click(function(){
        $.get('/stop');
      });
      $("#takepic").click(function(){
        toggleModal("confirmScreenshot");
        $.get('/takePic');
      });
      $("#reverse").on("mousedown", function() {
        //console.log(_pwm + "hello");
       $.ajax({
         url: '/reverse/{pwm}',
                         type: 'GET',
                         data: { pwm: getPWM() },
                         success: function(response)
                         {
                             console.log(response);

                         }
         });
       }).on('mouseup', function() {
       $.get('/stop');
      });
      $("#forward").on("mousedown", function() {
        //console.log(_pwm);
       $.ajax({
         url: '/forward/{pwm}',
                         type: 'GET',
                         data: { pwm: getPWM() },
                         success: function(response)
                         {
                             console.log(response);

                         }
         });
       }).on('mouseup', function() {
       $.get('/stop');
      });
      $("#left").on("mousedown", function() {
        //console.log(_pwm);
       $.ajax({
         url: '/left/{pwm}',
                         type: 'GET',
                         data: { pwm: getPWM() },
                         success: function(response)
                         {
                             console.log(response);

                         }
         });
       }).on('mouseup', function() {
       $.get('/stop');
      });
      $("#right").on("mousedown", function() {
        // console.log(_pwm);
       $.ajax({
         url: '/right/{pwm}',
                         type: 'GET',
                         data: { pwm: getPWM() },
                         success: function(response)
                         {
                             console.log(response);

                         }
         });
       }).on('mouseup', function() {
       $.get('/stop');
      });

//---------------  This section is used for calling panning functions on the camera. -------------//

      $("#panLeft").on("click", function() {
        //get value of freq
        //if value +100 <= 1500 then proceed to go to ajax call
        //else
        var currFreq = parseInt($("#freq").val());
        var incFreq = currFreq + 100;
        console.log(incFreq);

        if(incFreq <= 2500){
            //dynamically change the freq value
            $("#freq").val(incFreq);
            $.ajax({
            url: '/panMovement/{freq}',
                          type: 'GET',
                          data: { freq: incFreq},
                          success: function(response)
                          {
                              console.log(response);
                          }
          });
        }
        else{
          alert("Cant do that");
        }
      });

      $("#panTiltNeutral").on("click", function() {
	$("#freq").val(1500);
	$.ajax({
          url: '/panTiltNeutral',
                        type: 'GET',
                        success: function(response)
                        {
                            console.log(response);
                        }

        });
      });

      $("#panRight").on("click", function() {//get value of freq
        //if value +100 <= 1500 then proceed to go to ajax call
        //else
        var currFreq = parseInt($("#freq").val());
        var decFreq = currFreq - 100;
        console.log(decFreq);

        if(decFreq >= 600){
            //dynamically change the freq value
            $("#freq").val(decFreq);
            $.ajax({
            url: '/panMovement/{freq}',
                          type: 'GET',
                          data: { freq: decFreq},
                          success: function(response)
                          {
                              console.log(response);
                          }
          });
        }
        else{
          alert("Cant do that");
        }
      });

//---------------  This section is used for calling tilting functions on the camera. -------------//

      $("#tiltLeft").on("click", function() {
        //get value of freq
        //if value +100 <= 1500 then proceed to go to ajax call
        //else
        var currFreq = parseInt($("#tiltFreq").val());
        var incFreq = currFreq + 100;
        console.log(incFreq);

        if(incFreq <= 2400){
            //dynamically change the freq value
            $("#tiltFreq").val(incFreq);
            $.ajax({
            url: '/tiltMovement/{tiltFreq}',
                          type: 'GET',
                          data: { freq: incFreq},
                          success: function(response)
                          {
                              console.log(response);
                          }
          });
        }
        else{
          alert("Cant do that");
        }
      });

      $("#panTiltNeutral").on("click", function() {
        $("#tiltFreq").val(1400);
        $.ajax({
          url: '/panTiltNeutral',
                        type: 'GET',
                        success: function(response)
                        {
                            console.log(response);
                        }

        });
      });

      $("#tiltRight").on("click", function() {
        //get value of freq
        //if value +100 <= 1500 then proceed to go to ajax call
        //else
        var currFreq = parseInt($("#tiltFreq").val());
        var decFreq = currFreq - 100;
        console.log(decFreq);

        if(decFreq >= 900){
            //dynamically change the freq value
            $("#tiltFreq").val(decFreq);
            $.ajax({
            url: '/tiltMovement/{tiltFreq}',
                          type: 'GET',
                          data: { freq: decFreq},
                          success: function(response)
                          {
                              console.log(response);
                          }
          });
        }
        else{
          alert("Cant do that");
        }
      });

//---------------  This section is used for showing the pwm value. -------------//
      function getPWM(){
          var _pwm = $("#pwm").val();
          //console.log(_pwm);

        return _pwm;
      }

      function getFreq(){
          var _freq = $("#freq").val();
          //console.log(_pwm);

        return _freq;
      }

      function getSelect(){
          var _file = $("#mp3Files").val();

        return _file;
      }

      function getColor() {
        var _color = $("#rgb").val();

        return _color;
      }
  });

  function toggleModal(id){
    // When the user clicks the button, open the modal
    var modal = document.getElementById(id);
    var spans = document.getElementsByClassName("close");
    var modals = document.getElementsByClassName("modals");
    modal.style.display = "block";
    // When the user clicks on <span> (x), close the modal
    for (let i = 0; i < spans.length; i++) {
        spans[i].onclick = function () {
            modals[i].style.display = "none";
        }
    }
  }

  </script>


@endsection

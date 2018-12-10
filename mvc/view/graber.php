<!-- https://addpipe.com/blog/using-recorder-js-to-capture-wav-audio-in-your-html5-web-site/ -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Simple Recorder.js demo with record, stop and pause</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://addpipe.com/simple-recorderjs-demo/style.css">

	<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="8db2a8df-270b-47e9-bd71-bb52304a8a9b" type="text/javascript" async></script>
	<script id="CookieDeclaration" src="https://consent.cookiebot.com/8db2a8df-270b-47e9-bd71-bb52304a8a9b/cd.js" type="text/javascript" async></script>
  </head>
  <body>
    <h1>Simple Recorder.js demo</h1>
    <p>
        Matt Diamond‘s <a href="https://github.com/mattdiamond/Recorderjs">Recorder.js</a> is a popular JavaScript library for recording audio in the browser as uncompressed pcm audio in .wav containers. Before it the only way to record audio was to use Flash.
    </p>

    <p>Check out the <a href="https://github.com/addpipe/simple-recorderjs-demo" target="_blank">code on GitHub</a> and our <a href="https://addpipe.com/blog/using-recorder-js-to-capture-wav-audio-in-your-html5-web-site/" target="_blank">blog post on using Recorder.js to capture WAV audio</a>.</p>
    <div id="controls">
  	 <button id="recordButton">Record</button>
  	 <button id="pauseButton" disabled>Pause</button>
  	 <button id="stopButton" disabled>Stop</button>
    </div>
    <div id="formats">Format: start recording to see sample rate</div>
  	<h3>Recordings</h3>
  	<ol id="recordingsList"></ol>

    <!-- inserting these scripts at the end to be able to use all the elements in the DOM -->
      <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
      <script src="../assets/js/recorderjs/app.js"></script>
      <!--<script src="https://addpipe.com/simple-recorderjs-demo/js/app.js"></script>-->
      
    
	<!-- <script type="text/plain" data-cookieconsent="statistics">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-133914-18', 'auto');
	ga('set', 'anonymizeIp', true);
	ga('send', 'pageview');
	</script> -->
  </body>
</html>
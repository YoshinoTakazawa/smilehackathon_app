<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    <script type="text/JavaScript">
        $(function(){
      var qrtext = "https://sites.google.com/view/smile-hackathon";
      var utf8qrtext = unescape(encodeURIComponent(qrtext));
      $("#img-qr").html("");
      $("#img-qr").qrcode({text:utf8qrtext}); 
    });
    </script>
</head>

<body>
    <div id="img-qr"></div>
</body>

</html>
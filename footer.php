</div>
  <style>
    #ana_div {
    display:flex;
    height: 50px;
    margin-right: auto;
    margin-left: auto;      
}
z
.div {
    width: 350px;
    margin-right: 100px;
    color: black;

}
  </style>
  <hr>
  <footer>
<div id="ana_div">
    
    <div class="div" id="div" style="margin-right: 50px;" > <img src="img/logo2kck.png" width="150px" title="Atolye Noon" alt="Atolye Noon"></div>
    <div class="div" id="div2"   style="  margin-right: 50px;  color:#9a9a9a; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">BEŞEVLER MAH. BİRCAN SOKAK NO:1 DAİRE:4
        <br> ZİYA İŞ MERKEZİ
        NİLÜFER BURSA</div>
    <div class="div" id="div3" style=" color:#9a9a9a; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">TEL +90 541 772 01 74 <br> TEL +90 532 463 86 68
</div>

</div>
</footer>
  <img src="img/up-chevron.png" onclick="topFunction()" id="myBtn" title="Go to top" alt="">





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
  <script src=”https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js”></script>
  <Script>
    //Get the button
    var mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

  </script>
</body>

</html>
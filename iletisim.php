
 <?php include 'header.php' ?>
  
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-8 col-md-4 col-xs-4 w-100">


                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3046.9309958831454!2d28.954071674032534!3d40.21059787575948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14ca16acc46ec4b3%3A0x5edbe3bd1db03829!2sBe%C5%9Fevler%2C%20Bircan%20Sk.%20No%3A1%2C%2016110%20Nil%C3%BCfer%2FBursa!5e0!3m2!1str!2str!4v1602181107472!5m2!1str!2str"
                    class="d-block w-100" width="600" height="450" frameborder="0" style="border:0;  "
                    allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>



            <div class="col-lg-4 col-md-8 col-xs-8 w-100">
                <div class="container" style="margin-top: 70px;">
                    <div style="float: left; margin-top: 40px;">
                        <img src="img/location-pin.png" alt="">
                    </div>
                    <p style="font-size: 20px; margin-left: 50px;"> BEŞEVLER MAH. BİRCAN SOKAK NO: 1 DAİRE: 4 ZİYA İŞ
                        MERKEZİ <br>
                        NİLÜFER BURSA</p>
                    <hr>
                    <div style="margin-top: 80px;">
                        <div style="float:left; margin-top: 10px;">
                            <img src="img/telephone.png" alt="">
                        </div>
                        <div>
                            <div style="margin-left: 50px; ">
                                <a id="tel" href="tel://+90 541 772 01 74"> TEL +90 541 772 01 74 </a> <br>
                                <a id="tel" href="tel://+90 532 463 86 68"> TEL +90 532 463 86 68 </a>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
        <hr>
    </div>

    <div class="container">
        <div class="row">




            <footer class="footer mt-auto py-3">
                <div class="container">
                    <img src="img/logo2kck.png" width="150px" title="Atolye Noon" alt="Atolye Noon">


                </div>
            </footer>
            <footer class="footer mt-auto py-3" style="margin-top: 200px;">
                <div class="container">

                    <span class="text-muted" style=" margin-right: 120px; font-family:inherit">BEŞEVLER MAH. BİRCAN
                        SOKAK NO:1 DAİRE:4 <br> ZİYA İŞ MERKEZİ
                        NİLÜFER BURSA</span>



                </div>

            </footer>
            <footer class="footer mt-auto py-3">
                <div class="container">

                    <span class="text-muted" style=" font-family: inherit">TEL +90 541 772 01 74 <br> TEL +90 532 463 86
                        68

                    </span>

                </div>
            </footer>
            <footer class="footer mt-auto py-3">
                <div class="container">

                    <span class="text-muted"
                        style=" margin-right: 170px;  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><br></span>

                </div>

            </footer>
        </div>
    </div>
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
        var mybutton = document.getElementById("myBtn");

        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

    </script>
</body>

</html>
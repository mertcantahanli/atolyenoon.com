<?php include 'header.php' ?>


    <div class="container jumbotron" style="margin-top: 100px; background-color: white;">
        <h1 class="display-4">HAKKINDA</h1>
        <p class="lead" style="text-transform: capitalize; ">noon mimarlık, günün ihtiyaçlarına eşlik eden, insanı ve insan ölçeğini merkez alan, inovatif bir tasarım atölyesidir. <br>
            2019 yılında Bursa merkezli, 2 mimar tarafından çalışmalarına başlamıştır.
        </p>
        
        
        
      </div>


    <div class="container" >
        <div class="row">
            <div class="col-lg-8 col-md-4 col-xs-4 w-100" style="text-align:right; margin-top: 100px; font-size: 20px;">
                <h3>SALİH RAMAZANOĞLU</h3>
                <p> 1994 Batman doğumlu , Uludağ Üniversitesi Mimarlık Fakültesi 2018 Lisans mezunudur,
                    Yüksek lisans eğitimine Uludağ Üniversitesinde devam etmektedir. <br>
                    2016 yılında kurulan KOT FARKI topluluğunun kurucularıdan biridir. <br>
                    Öğrencilik ve Meslek dönemlerinde çeşitli ulusal ve uluslararası yarışmalara katılmıştır.
                    Noon Mimarlık bünyesinde kurucu ortak olarak mesleki hizmetine devam etmektedir.
                </p>
            </div>

            <div class="col-lg-4 col-md-8 col-xs-8 w-100">
                <div class="container">

                    <img src="img/hakkinda/salih.jpeg" alt="" class="d-block w-100">
                </div>

            </div>
        </div>
        <hr>
    </div>


    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-xs-8 w-100" style="text-align:center;">
                <img src="img/hakkinda/sezer.jpeg" alt="" class="d-block w-100">
            </div>

            <div class="col-lg-8 col-md-4 col-xs-4 w-100">
                <div class="container" style="  text-align: justify; margin-top: 100px; font-size: 20px;">
                    <h3>SEZER SEÇGİNLİ</h3>
                    <p> 1995 yılında Karsta doğdu. <br>
                        Uludağ Üniversitesi Mimarlık Fakültesinde lisans eğitimini 2018 yılında tamamladı.
                        Eğitim hayatı boyunca ve sonrasında Bursa'da çeşitli ofislerde çalışma imkanı buldu. <br>
                        Birçok öğrenci ve profesyonel yarışmaya katıldı.
                        Kurucu ortak olduğu Noon Mimarlık bünyesinde faaliyetlerine devam etmektedir.

                    </p>


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
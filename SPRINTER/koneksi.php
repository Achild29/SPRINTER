<?php 
        $connect= mysqli_connect("localhost","root","","sprinter") or die("gagal connect");

        function Funfooter() {
                echo "
                <footer id='footer' class='footer'>
                        <div class='copyright'>
                                &copy; Copyright <strong><span>2024</span></strong>
                        </div>
                        <div class='credits'>
                                Designed by <a href='https://youtu.be/id_a1VpIOJA?si=rkboW6XR-dYj_pgR' target='_blank'>Anak Sistem Informasi</a>
                        </div>
                </footer>";
        }

?>
   <!-- Footer -->
   <footer class="sticky-footer bg-white">
       <div class="container my-auto">
           <div class="copyright text-center my-auto">
               <span>Copyright &copy; PT. INTI <?= date('Y'); ?></span>
           </div>
       </div>
   </footer>
   <!-- End of Footer -->

   </div>
   <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
       <i class="fas fa-angle-up"></i>
   </a>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Apakah kamu ingin Logout?</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               <div class="modal-body">Dengan memilih logout sesi kamu akan di reset</div>
               <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                   <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
               </div>
           </div>
       </div>
   </div>

   <!-- Bootstrap core JavaScript-->
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"></script> -->
   <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/bootstrap-toggle-master/js/bootstrap4-toggle.min.js"></script>
   <!-- Core plugin JavaScript-->
   <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
   <script src="<?= base_url('assets/'); ?>vendor/jonthornton-jquery-timepicker/jquery.timepicker.min.js"></script>
   <script src="<?= base_url('assets'); ?>/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>



   <!-- Custom scripts for all pages-->
   <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>


   <!-- sweet Alert -->
   <script src="<?= base_url('assets/'); ?>/js/sweetalert2.all.min.js"></script>

   <!-- Chart JS -->
   <script src="<?= base_url(''); ?>vendor/package/dist/chart.min.js"></script>
   <script>
       const flashData = $('.flash-data').data('flashdata');


       if (flashData) {
           Swal.fire({
               title: 'Data Berhasil ' + flashData,
               text: '',
               icon: 'success'
           });
       }

       const absenData = $('.absen-data').data('flashdata');


       if (absenData) {
           Swal.fire({
               title: absenData,
               text: '',
               icon: 'success'
           });
       }



       // tombol hapus
       $('.tombol-hapus').on('click', function(e) {
           e.preventDefault();

           const href = $(this).attr('href');


           Swal.fire({
               title: 'Apakah kamu ingin menghapus data?',
               showCancelButton: true,
               confirmButtonText: 'Hapus',
           }).then((result) => {
               /* Read more about isConfirmed, isDenied below */
               if (result.isConfirmed) {
                   document.location.href = href;
               }
           });
       });
   </script>

   <script>
       $('#image').change(function(event) {
           var fileName = event.target.files[0].name;
           if (event.target.nextElementSibling != null) {
               event.target.nextElementSibling.innerText = fileName;
           }
       });
       // detail pegawai
       $("#detail").click(function() {
           // assumes element with id='button'
           $("#toggle").toggle("d-none");
       });

       // detail pendapatan
       $("#detailPendapatan").click(function() {
           // assumes element with id='button'
           $("#chart").toggle("d-none");
       });



       function number_format(number, decimals, dec_point, thousands_sep) {
           // *     example: number_format(1234.56, 2, ',', ' ');
           // *     return: '1 234,56'
           number = (number + '').replace(',', '').replace(' ', '');
           var n = !isFinite(+number) ? 0 : +number,
               prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
               sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
               dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
               s = '',
               toFixedFix = function(n, prec) {
                   var k = Math.pow(10, prec);
                   return '' + Math.round(n * k) / k;
               };
           // Fix for IE parseFloat(0.55).toFixed(0) = 0;
           s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
           if (s[0].length > 3) {
               s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
           }
           if ((s[1] || '').length < prec) {
               s[1] = s[1] || '';
               s[1] += new Array(prec - s[1].length + 1).join('0');
           }
           return s.join(dec);
       }

       // Bar Chart Example
       var ctx = document.getElementById("myChart");
       var myChart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: [<?php if (count($pendapatan) > 0) {
                            foreach ($pendapatan as $pd) {
                                echo "'" . format_indo($pd->tanggal) . "',";
                            }
                        }
                        ?>],
               datasets: [{
                   label: "Pendapatan Agustus",
                   backgroundColor: "#4e73df",
                   hoverBackgroundColor: "#2e59d9",
                   borderColor: "#4e73df",
                   data: [
                       <?php if (count($pendapatan) > 0) {
                            foreach ($pendapatan as $pd) {
                                echo "'" . $pd->nominal . "',";
                            }
                        }
                        ?>
                   ],
               }],
           },
           options: {
               maintainAspectRatio: false,
               layout: {
                   padding: {
                       left: 10,
                       right: 25,
                       top: 25,
                       bottom: 0
                   }
               },
               scales: {
                   xAxes: [{
                       time: {
                           unit: 'month'
                       },
                       gridLines: {
                           display: false,
                           drawBorder: false
                       },
                       ticks: {
                           maxTicksLimit: 6
                       },
                       maxBarThickness: 25,
                   }],
                   yAxes: [{
                       ticks: {
                           min: 0,
                           max: 500000000,
                           stepSize: 5000000,
                           maxTicksLimit: 8,
                           padding: 10,
                           // Include a dollar sign in the ticks
                           callback: function(value, index, values) {
                               return 'Rp.' + number_format(value);
                           }
                       },
                       gridLines: {
                           color: "rgb(234, 236, 244)",
                           zeroLineColor: "rgb(234, 236, 244)",
                           drawBorder: false,
                           borderDash: [2],
                           zeroLineBorderDash: [2]
                       }
                   }],
               },
               legend: {
                   display: false
               },
               tooltips: {
                   titleMarginBottom: 10,
                   titleFontColor: '#6e707e',
                   titleFontSize: 14,
                   backgroundColor: "rgb(255,255,255)",
                   bodyFontColor: "#858796",
                   borderColor: '#dddfeb',
                   borderWidth: 1,
                   xPadding: 15,
                   yPadding: 15,
                   displayColors: false,
                   caretPadding: 10,
                   callbacks: {
                       label: function(tooltipItem, chart) {
                           var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                           return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
                       }
                   }
               },
           }
       });
   </script>

   <script>
       //     
       <?php if ($dataapp['maps_use'] == TRUE) : ?>
           let maps_absen = "searching...";
           if (document.getElementById("maps-absen")) {
               window.onload = function() {
                   var popup = L.popup();
                   var geolocationMap = L.map("maps-absen", {
                       center: [40.731701, -73.993411],
                       zoom: 15,
                   });

                   L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                       attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                   }).addTo(geolocationMap);

                   function geolocationErrorOccurred(geolocationSupported, popup, latLng) {
                       popup.setLatLng(latLng);
                       popup.setContent(
                           geolocationSupported ?
                           "<b>Error:</b> The Geolocation service failed." :
                           "<b>Error:</b> This browser doesn't support geolocation."
                       );
                       popup.openOn(geolocationMap);
                   }

                   if (navigator.geolocation) {
                       navigator.geolocation.getCurrentPosition(
                           function(position) {
                               var latLng = {
                                   lat: position.coords.latitude,
                                   lng: position.coords.longitude,
                               };



                               var marker = L.marker(latLng).addTo(geolocationMap);
                               maps_absen = position.coords.latitude + ", " + position.coords.longitude;
                               geolocationMap.setView(latLng);
                               $('#mapAbsen').attr('value', maps_absen);

                           },
                           function() {
                               geolocationErrorOccurred(true, popup, geolocationMap.getCenter());
                               maps_absen = 'No Location';
                           }
                       );
                   } else {
                       //No browser support geolocation service
                       geolocationErrorOccurred(false, popup, geolocationMap.getCenter());
                       maps_absen = 'No Location';
                   }
               };
           }
       <?php elseif ($dataapp['maps_use'] == FALSE) : ?>
           maps_absen = 'No Location';
       <?php endif; ?>

       $("#btn-absensi").click(function(e) {

           e.preventDefault(); // avoid to execute the actual submit of the form.

           let ket_absen = $('#ket_absen').val();

           $.ajax({
               type: "POST",
               url: '<?= base_url('ajax/absenajax'); ?>',
               data: {
                   maps_absen: maps_absen,
                   ket_absen: ket_absen
               }, // serializes the form's elements.
               dataType: 'json',
               beforeSend: function() {
                   swal.fire({
                       imageUrl: "<?= base_url('assets'); ?>/img/ajax-loader.gif",
                       title: "Proses Absensi",
                       text: "Please wait",
                       showConfirmButton: false,
                       allowOutsideClick: false
                   });
               },
               success: function(response) {
                   if (response.success == true) {
                       swal.fire({
                           icon: 'success',
                           title: 'Absen Sukses',
                           text: 'Anda Telah Absen!',
                           showConfirmButton: false,
                           timer: 1500
                       });
                       $('#func-absensi').load(location.href + " #func-absensi");
                   } else {
                       $("#infoabsensi").html(response.msgabsen).show().delay(3000).fadeOut();
                       swal.close()
                   }
               },
               error: function() {
                   swal.fire("Absen Gagal", "Ada Kesalahan Saat Absen!", "error");


               }
           });


       });
   </script>

   <script>
       function showTime() {
           var a_p = "";
           var today = new Date();
           var curr_hour = today.getHours();
           var curr_minute = today.getMinutes();
           var curr_second = today.getSeconds();
           if (curr_hour < 12) {
               a_p = "AM";
           } else {
               a_p = "PM";
           }
           if (curr_hour == 0) {
               curr_hour = 12;
           }
           if (curr_hour > 12) {
               curr_hour = curr_hour - 12;
           }
           curr_hour = checkTime(curr_hour);
           curr_minute = checkTime(curr_minute);
           curr_second = checkTime(curr_second);
           document.getElementById('clocknow').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " ";

       }

       function checkTime(i) {
           if (i < 10) {
               i = "0" + i;
           }
           return i;
       }
       setInterval(showTime, 500);
   </script>

   <script>
       arrbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
       arrHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
       date = new Date();
       millisecond = date.getMilliseconds();

       hari = date.getDay();
       tanggal = date.getDate();
       bulan = date.getMonth();
       tahun = date.getFullYear();
       document.getElementById('datenow').innerHTML = arrHari[hari] + " , " + tanggal + " " + arrbulan[bulan] + " " + tahun;
   </script>

   </body>

   </html>
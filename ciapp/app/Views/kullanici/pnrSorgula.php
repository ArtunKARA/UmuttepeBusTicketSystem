<div class="ban-bottom">
<!--- selectroom ---->
<div class="selectroom">
	<div class="container">

		<div class="selectroom_top">

    <div class="login">
              <div class="row">
                <div class="kart-right">
                  <form>
                    <label for="PNR" style="color: #4CB320; float: left; margin-right: 10px;">PNR Sorgula</label>
                    <input id="pnrInput" type="text" name="PNR" value="PNR" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PNR';}" required="">
                      </form>
                      <div class="bnr-right">
                        <button onclick="sorgula()" class="btn" style="width: 100% ;color:white;background-color: #4CB320;outline: none;font-size: 14px;padding: 10px 10px ; border: 1px solid #9E9E9E;margin-top: 10px; border: 1px solid #E6E4E4 ;">PNR Sorgula</button>
                    </div>
                </div>
              </div>
            </div>

            <script>
                function qrCode(s, w = 200, h = 200) {
                      var u = 'https://chart.googleapis.com/chart?chs=%dx%d&cht=qr&chl=%s';
                      var url = u.replace("%d", w).replace("%d", h).replace("%s", s);
                      return url;
                }
                function sorgula() {
                    var pnr = document.getElementById("pnrInput").value;
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "http://localhost:8080/UmuttepeBusTicketSystem/ciapp/public/pnrAPI?pnr=" + encodeURIComponent(pnr), true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            console.log(response);
                            if(response.length == 0){
                                alert("Böyle bir bilet bulunamadı.");
                                document.getElementById("bilet").hidden = true;
                                return;
                            }
                            document.getElementById("bilet").hidden = false;
                            document.getElementById("pnrValue").innerText = response[0].PNR;
                            document.getElementById("yolcuAdi").innerText = response[0].YolcuAdi;
                            document.getElementById("kalkisTarihSaat").innerText = response[0].Tarih + " " + response[0].KalkisSaat;
                            document.getElementById("kalkisSehriVarisSehri").innerText = response[0].KalkisSehri + " - " + response[0].VarisSehri;
                            document.getElementById("koltukNo").innerText = response[0].KoltukNo;
                            document.getElementById("biletUcret").innerText = response[0].BiletUcret + " TL";
                            document.getElementById("qrCode").src = qrCode(response[0].PNR);
                            
                        }
                        else{
                          // Hata oluştu, uygun işlemleri gerçekleştir
                          console.error('Hata oluştu: ' + xhr.status);
                      }
                    };
                    xhr.send();
                }
            </script>
            <div class="rom-btm" id="bilet" hidden>
                    <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
                        <img id="qrCode" style="display:block ;margin-left: auto; margin-right: auto;">
                        <p style="font-size:small;"><span id="pnrValue"></span></p>
                    </div>
                    <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
                        <h4 id = "kalkisSehriVarisSehri"></h4>
                        <h6>Kalkış Tarih / Saat</h6>
                        <p><span id="kalkisTarihSaat"></span></p>    
                        <h6 style="color: #4CB320;">Koltuk No: <span style="color: black;" id="koltukNo"></span></h6>
                        <h6 style="color: #4CB320;">Yolcu Adı: <span style="color: black;" id="yolcuAdi"></span></h6>
                        <p></p>
                    </div>
                    <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
                        <h5><span id="biletUcret"></span></h5>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
	    </div>
    </div>
</div>
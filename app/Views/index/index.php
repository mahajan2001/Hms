<?php include(INCLUDESPATH . '/header.php'); ?>
<?php /* 
<div class="container p-3 my-3 border">
    <form>
        <div class="row ">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-4 ">
                        <label for="g_name" class="form-label">मिळकत लिहून घेणाऱ्या व्यक्तींची संख्या :</label>
                    </div>
                    <div class="col-md-5"><select class="form-select" id="select_gnumber">
                            <option selected value="0">संख्या निवडा </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4 ">
                        <label for="g_name" class="form-label">मिळकत लिहून देणाऱ्या व्यक्तींची संख्या :</label>
                    </div>
                    <div class="col-md-5"><select class="form-select" id="select_dnumber">
                            <option selected value="0">संख्या निवडा </option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div>
                <div id="g_posts"></div>
                <div id="d_posts"></div>

            </div>

            <div class="fieldset">
                <fieldset class="border p-4 rounded ">
                    <legend class="float-none w-auto"> <b> मिळकतिची माहिती: </b></legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="g_name" class="form-label">गाव :</label>
                            <input type="text" placeholder="Enter village name" class="form-control" id="g_name_village_name">
                            <span id="g_name_error" style="color:red"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="g_age" class="form-label">मिळकत कोणती आहे :</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="saat_bara" value="option1">
                                <label class="form-check-label" for="inlineRadio1">७/१२ </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="siti_sarveshan" value="option2">
                                <label class="form-check-label" for="inlineRadio2">सिटि सर्वेक्षण</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="8_a" value="option3">
                                <label class="form-check-label" for="inlineRadio3">8 अ </label>
                            </div>
                            <span id="g_age_error" style="color:red"></span>
                        </div>
                    </div>


                </fieldset>
            </div>
            <div class="fieldset">
                <fieldset class="border p-4 rounded ">
                    <legend class="float-none w-auto"> <b> मिळकतिची चतुर सीमा</b></legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="g_name" class="form-label">पूर्व :</label>
                            <input placeholder="Enter direction " type="text" class="form-control" id="g_name_east">
                            <span id="g_name_error" style="color:red"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="g_name" class="form-label">पश्चिम :</label>
                            <input placeholder="Enter direction " type="text" class="form-control" id="g_name_west">
                            <span id="g_name_error" style="color:red"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="g_name" class="form-label">दक्षिण :</label>
                            <input placeholder="Enter direction " type="text" class="form-control" id="g_name_south">
                            <span id="g_name_error" style="color:red"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="g_name" class="form-label">उत्तर :</label>
                            <input placeholder="Enter direction " type="text" class="form-control" id="g_name_north">
                            <span id="g_name_error" style="color:red"></span>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="fieldset">
                <fieldset class="border p-4 rounded ">
                    <legend class="float-none w-auto"> <b> साक्षीदार </b></legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="g_name" class="form-label">नाव :</label>
                            <input placeholder="Enter name" type="text" class="form-control" id="g_name_sakshidar_name">
                            <span id="g_name_error" style="color:red"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="g_age" class="form-label">वय :</label>
                            <input placeholder="Enter age" type="number" class="form-control" id="g_name_sakshidar_age">
                            <span id="g_age_error" style="color:red"></span>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-sm-6">
                            <label for="g_age" class="form-label">मोबईल नंबर :</label>
                            <input placeholder="Enter mobile number" type="number" class="form-control" id="g_name_sakshidar_mobile_number">
                            <span id="g_age_error" style="color:red"></span>
                        </div>
                        <div class="col-sm-6">
                            <label for="g_age" class="form-label">पत्ता :</label>
                            <textarea placeholder="Enter address" type="number" class="form-control" id="g_name_sakshidar_address"></textarea>
                            <span id="g_age_error" style="color:red"></span>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="form-group mt-3">
                <a id='addDetails' name='addDetails' onclick="return addDetails()" class="btn btn-outline-primary float-left">Submit</a>
            </div>


        </div><!-- /# column -->
</div>
</form>
</div>

*/ ?>


<script>
    var d_divs = [];
    document
        .getElementById("select_dnumber")
        .addEventListener("change", function(e) {
            var n = +this.value;
            var num;
            for (var i = 0; i < d_divs.length; i++) {
                d_divs[i].remove();
            }
            d_divs = [];
            var counter = 0;
            for (var i = 0; i < n; i++) {
                var d = document.createElement("div");
                d.id = counter;
                counter += 1;
                d.innerHTML += `<div class="fieldset">
                    <fieldset class="border p-4 rounded ">
                        <legend class="float-none w-auto"> <b> मिळकत लिहून देणारा ${counter}: </b></legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="d_name${counter}" class="form-label">नाव :</label>
                                <input type="text" class="form-control" placeholder="Enter your name" id="d_name${counter}">
                                <span id="d_name_error" style="color:red"></span>
                            </div>
                            <div class="col-sm-6">
                                <label for="d_age${counter}" class="form-label">वय :</label>
                                <input type="number" placeholder="Enter age" class="form-control" id="d_age${counter}">
                                <span id="d_age_error" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-sm-6">
                                <label for="d_mobile${counter}" class="form-label">मोबईल नंबर :</label>
                                <input type="number" placeholder="Enter mobile number" class="form-control" id="d_mobile${counter}">
                                <span id="d_mobile_error" style="color:red"></span>
                            </div>
                            <div class="col-sm-6">
                                <label for="d_aadhar${counter}" class="form-label">आधार कार्ड नंबर :</label>
                                <input type="number" placeholder="Enter  aadhar card number" class="form-control" id="d_aadhar${counter}">
                                <span id="d_aadhar_error" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-sm-6">
                                <label for="d_pan${counter}" class="form-label">पॅन कार्ड नंबर :</label>
                                <input type="text" placeholder="Enter pan card number" class="form-control" id="d_pan${counter}">
                                <span id="d_pan_error" style="color:red"></span>
                            </div>
                            <div class="col-sm-6">
                                <label for="d_address${counter}" class="form-label">पत्ता :</label>
                                <textarea type="d_address${counter}" placeholder="Enter address" class="form-control" id="d_address${counter}"></textarea>
                                <span id="d_address${counter}_error" style="color:red"></span>
                            </div>
                        </div>
                    </fieldset>
                </div>`;
                d.className = "fieldset";
                document.getElementById('d_posts').appendChild(d);
                d_divs.push(d);
            }
        });


    var g_divs = [];
    document
        .getElementById("select_gnumber")
        .addEventListener("change", function(e) {
            var n = +this.value;
            var num;
            for (var i = 0; i < g_divs.length; i++) {
                g_divs[i].remove();
            }
            g_divs = [];
            var ncounter = 0;
            for (var i = 0; i < n; i++) {
                var d = document.createElement("div");
                d.id = ncounter;
                ncounter += 1;
                d.innerHTML += `<fieldset class="border p-4 rounded">
                            <legend class="float-none w-auto"> <b>मिळकत लिहून घेणारा ${ncounter} :</b></legend>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="g_name${ncounter}" class="form-label">नाव :</label>
                                    <input placeholder="Enter your Name" type="text" class="form-control" id="g_name${ncounter}">
                                    <span id="g_name_error" style="color:red"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="g_age${ncounter}" class="form-label">वय :</label>
                                    <input placeholder="Enter your age" type="number" class="form-control" id="g_age${ncounter}">
                                    <span id="g_age_error" style="color:red"></span>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-6">
                                    <label for="g_mobile${ncounter}" class="form-label">मोबईल नंबर :</label>
                                    <input placeholder="Enter your Mobile Number" type="number" class="form-control" id="g_mobile${ncounter}">
                                    <span id="g_age_error" style="color:red"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="g_aadhar${ncounter}" class="form-label">आधार कार्ड नंबर :</label>
                                    <input placeholder="Enter your addhar number" type="number" class="form-control" id="g_aadhar${ncounter}">
                                    <span id="g_age_error" style="color:red"></span>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-6">
                                    <label for="g_pan${ncounter}" class="form-label">पॅन कार्ड नंबर :</label>
                                    <input placeholder="Enter your pan card number" type="text" class="form-control" id="g_pan${ncounter}">
                                    <span id="g_age_error" style="color:red"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="g_address${ncounter}" class="form-label">पत्ता :</label>
                                    <textarea type="g_age" placeholder="Enter your address" class="form-control" id="g_address${ncounter}"></textarea>
                                    <span id="g_age_error" style="color:red"></span>
                                </div>
                            </div>`;
                d.className = "fieldset";
                document.getElementById('g_posts').appendChild(d);
                g_divs.push(d);
            }
        });



    function addDetails() {
        //लिहून घेणारे  
        var g_array = [];

        for (i = 1; i <= g_divs.length; i++) {
            g_array.push({
                name: $('#g_name' + i).val(),
                age: $('#g_age' + i).val(),
                mobile: $('#g_mobile' + i).val(),
                addhar: $('#g_aadhar' + i).val(),
                panNo: $('#g_pan' + i).val(),
                address: $('#g_address' + i).val(),
            });
        }
        //लिहून देणारे 
        var d_array = [];
        for (j = 1; j <= d_divs.length; j++) {
            d_array.push({
                name: $('#d_name' + j).val(),
                age: $('#d_age' + j).val(),
                mobile: $('#d_mobile' + j).val(),
                addhar: $('#d_aadhar' + j).val(),
                panNo: $('#d_pan' + j).val(),
                address: $('#d_address' + j).val(),
            });
        }

        var milkatichi_mahiti = [];
        var is_sat_bara_checked = 0;
        var is_siti_sarveshan = 0;
        var is_8_a = 0;
        if ($('#saat_bara').is(':checked')) {
            is_sat_bara_checked = 1;
        }
        if ($('#siti_sarveshan').is(':checked')) {
            is_siti_sarveshan = 1;
        }
        if ($('#8_a').is(':checked')) {
            is_8_a = 1;
        }

        milkatichi_mahiti.push({
            village_name: $('#g_name_village_name').val(),
            is_sat_bara: is_sat_bara_checked,
            is_siti_sarveshan: is_siti_sarveshan,
            is_8_a: is_8_a,
            g_name_east: $('#g_name_east').val(),
            g_name_west: $('#g_name_west').val(),
            g_name_north: $('#g_name_north').val(),
            g_name_south: $('#g_name_south').val(),
            sakshidar_name: $('#g_name_sakshidar_name').val(),
            sakshidar_age: $('#g_name_sakshidar_age').val(),
            sakshidar_mobile: $('#g_name_sakshidar_mobile_number').val(),
            sakshidar_address: $('#g_name_sakshidar_address').val()
        })

        $.ajax({
            url: "<?= FORM_PATH ?>addForm",
            type: "POST",
            datatype: "json",
            crossDomain: true,
            data: JSON.stringify({
                "lihunGhenare": g_array,
                "lihunDenare": d_array,
                "milkatichi_mahiti": milkatichi_mahiti
            }),
            success: function(data) {
                if (data.success == true) {
                    Swal.fire({
                        title: 'Data Saved',
                        text: "Your data has been stored in database",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?= INDEX_PATH ?>"
                        }
                    })
                } else {
                    window.location.reload();
                }
            },
            error: function(data) {
                console.log("error is" + JSON.stringify(data));
            }
        })
    }
</script>
</body>

</html>
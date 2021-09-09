@extends('frontEnd/vindoers/vindoer_home')

@section('content')

        <!-- //////////////////////////////////////////////////// -->
        <div class="financial-transactions mt-5">
            <div class="container">

                <div class="row mb-3">
                    <div class="col-12">
                        <h4>المعاملات المالية</h4>
                        <hr />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">

                        <canvas id="myChart" style="width:100%;"></canvas>

                    </div>
                    <div class="col-md-6 mb-4">

                        <h6>المعاملات المالية <a href="#" class="float-right">إظهار الكل ></a></h6>

                        <ul class="list-group">
                            <li class="list-group-item">
                                <h6>مرشح رذاذ البنزين
                                    <span class="float-right">+78.35 SAR</span>
                                </h6>
                                <span style="font-size:12px;">الطلب #252145254</span>
                            </li>

                            <li class="list-group-item">
                                <h6>سحب
                                    <span class="float-right">-178.35 SAR</span>
                                </h6>
                                <span style="font-size:12px;">البطاقة ******87</span>
                            </li>

                            <li class="list-group-item">
                                <h6>مرشح رذاذ البنزين
                                    <span class="float-right">+78.35 SAR</span>
                                </h6>
                                <span style="font-size:12px;">الطلب #252145254</span>
                            </li>

                        </ul>
                    </div>
                </div>


                <br />
                <div class="row">

                    <div class="col-md-6 mb-4">
                        <canvas id="myChart2" style="width:100%"></canvas>
                        <br />
                        <h5>
                            قابل للسحب
                            <span class="btn btn-primary float-right" data-toggle="modal" data-target="#Withdrawal">طلب سحب</span>
                        </h5>
                        <h6>63.54 SAR</h6>


                    </div>
                    <div class="col-md-6 mb-4">
                        <canvas id="myChart3" style="width:100%"></canvas>
                        <br />
                        <h5>Outstanding balance</h5>
                        <h6>63.54 SAR</h6>
                    </div>

                </div>
                <br /><br /><br />

            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="Withdrawal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">طلب سحب</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="Draw-value">
                            <h5>Draw value</h5>
                            <h6>124.56 SAR</h6>
                        </div>

                        <br />

                        <form>

                            <div class="form-group">
                                <label for="Card-No">رقم البطاقة</label>
                                <input type="number" class="form-control" id="Card-No" />
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <!-- <label for="Ex">تاريخ الانتهاء</label>
                                    <input type="text" class="form-control" id="Ex" /> -->

                                    <label for="Ex">تاريخ الانتهاء</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <select name='expireMM' id='expireMM' class="form-control">
                                                <option value=''>شهر</option>
                                                <option value='01'>01</option>
                                                <option value='02'>02</option>
                                                <option value='03'>03</option>
                                                <option value='04'>04</option>
                                                <option value='05'>05</option>
                                                <option value='06'>06</option>
                                                <option value='07'>07</option>
                                                <option value='08'>08</option>
                                                <option value='09'>09</option>
                                                <option value='10'>10</option>
                                                <option value='11'>11</option>
                                                <option value='12'>12</option>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <select name='expireYY' id='expireYY' class="form-control">
                                                <option value=''>سنة</option>
                                                <option value='20'>2020</option>
                                                <option value='21'>2021</option>
                                                <option value='22'>2022</option>
                                                <option value='23'>2023</option>
                                                <option value='24'>2024</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="CVV">CVV</label>
                                    <input type="number" class="form-control" id="CVV" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control" id="name"/>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">احفظ بطاقتي للمستقبل</label>
                                </div>
                            </div>

                            <button class="btn btn-primary">حفظ</button>
                        </form>


                        <br />

                        <h5>البطاقات المحفوظة</h5>
                        <br />

                        <div class="row">

                            <div class="col-lg-6">
                                <p class="text-center">
                                    <img src="../img/visa.svg" class="img-fluid"> <br>
                                    <input type="radio" name="pay">
                                </p>
                            </div>

                            <div class="col-lg-6">
                                <p class="text-center">
                                    <img src="../img/visa2.svg" class="img-fluid"> <br>
                                    <input type="radio" name="pay">
                                </p>
                            </div>

                        </div>


                    </div> <!-- End Modal Body -->
                </div>
            </div>
        </div>

@section('script')
<script>
    var xValues = ["04", "05", "06", "07", "08", "09", "10"];
    var yValues = [55, 49, 44, 24, 22, 35, 40];
    var barColors = ["red", "#009aff","#337ab7","orange","brown","#f50"];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "الرصيد: 365.48 SAR"
        }
      }
    });
</script>

<script>
    var xValues = [50,60,70,80,90,100,110,120,130,140,150];
    var yValues = [7,8,8,9,9,9,10,11,14,14,15];

    new Chart("myChart2", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: 6, max:16}}],
        }
      }
    });
</script>

<script>
    var xValues = [50,60,70,80,90,100,110,120,130,140,150];
    var yValues = [7,8,8,9,9,9,10,11,14,14,15];

    new Chart("myChart3", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: 6, max:16}}],
        }
      }
    });
</script>
@endsection
@endsection

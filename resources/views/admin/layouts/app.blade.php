<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GoTeduh</title>
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/bootstrap/jquery/jquery.min.js")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/jquery/jquery-3.3.1.min.js")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/fonts/circular-std/style.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/libs/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css")}}">
    <link rel="stylesheet" href="{{asset("vendor/datepicker/css/datepicker.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/js/modules/exporting.js">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("vendor/concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css")}}">

    <link rel="stylesheet" href="{{asset("vendor/color-picker/dist/css/bootstrap-colorpicker.css")}}">
</head>
<style>
.MultiCheckBox {
     border:1px solid #e2e2e2;
     padding: 5px;
     border-radius:4px;
     cursor:pointer;
 }

 .MultiCheckBox .k-icon{
     font-size: 15px;
     float: right;
     font-weight: bolder;
     margin-top: -7px;
     height: 10px;
     width: 14px;
     color:#787878;
 }

 .MultiCheckBoxDetail {
     display:none;
     position:absolute;
     border:1px solid #e2e2e2;
     overflow-y:hidden;
 }

 .MultiCheckBoxDetailBody {
     overflow-y:scroll;
 }

     .MultiCheckBoxDetail .cont  {
         clear:both;
         overflow: hidden;
         padding: 2px;
     }

     .MultiCheckBoxDetail .cont:hover  {
         background-color:#cfcfcf;
     }

     .MultiCheckBoxDetailBody > div > div {
         float:left;
     }

 .MultiCheckBoxDetail>div>div:nth-child(1) {

 }

 .MultiCheckBoxDetailHeader {
     overflow:hidden;
     position:relative;
     height: 28px;
     background-color:#3d3d3d;
 }

     .MultiCheckBoxDetailHeader>input {
         position: absolute;
         top: 4px;
         left: 3px;
     }

     .MultiCheckBoxDetailHeader>div {
         position: absolute;
         top: 5px;
         left: 24px;
         color:#fff;
     }

     .switch {
       position: relative;
       display: inline-block;
       width: 90px;
       height: 34px;
     }

     .switch input {display:none;}

     .slider {
       position: absolute;
       cursor: pointer;
       top: 0;
       left: 0;
       right: 0;
       bottom: 0;
       background-color: #ca2222;
       -webkit-transition: .4s;
       transition: .4s;
     }

     .slider:before {
       position: absolute;
       content: "";
       height: 26px;
       width: 26px;
       left: 4px;
       bottom: 4px;
       background-color: white;
       -webkit-transition: .4s;
       transition: .4s;
     }

     input:checked + .slider {
       background-color: #2ab934;
     }

     input:focus + .slider {
       box-shadow: 0 0 1px #2196F3;
     }

     input:checked + .slider:before {
       -webkit-transform: translateX(55px);
       -ms-transform: translateX(55px);
       transform: translateX(55px);
     }

     /*------ ADDED CSS ---------*/
     .on
     {
       display: none;
     }

     .on, .off
     {
       color: white;
       position: absolute;
       transform: translate(-50%,-50%);
       top: 50%;
       left: 50%;
       font-size: 10px;
       font-family: Verdana, sans-serif;
     }

     input:checked+ .slider .on
     {display: block;}

     input:checked + .slider .off
     {display: none;}

     /*--------- END --------*/

     /* Rounded sliders */
     .slider.round {
       border-radius: 34px;
     }

     .slider.round:before {
       border-radius: 50%;}

</style>

<body>

    <div class="dashboard-main-wrapper">

        <div class="dashboard-header">
            @include('admin.layouts.nav');
        </div>

        @include('admin.layouts.sidebar');

        <div class="dashboard-wrapper">
            <div class="container">
                <main>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            @yield('content')
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script src="{{asset("vendor/concept/assets/vendor/jquery/jquery-3.3.1.min.js")}}"></script>
        <script src="{{asset("vendor/concept/assets/vendor/bootstrap/js/bootstrap.bundle.js")}}"></script>
        <script src="{{asset("vendor/concept/assets/vendor/slimscroll/jquery.slimscroll.js")}}"></script>
        <script src="{{asset("vendor/concept/assets/libs/js/main-js.js")}}"></script>
        <script src="{{asset("vendor/datepicker/js/bootstrap-datepicker.js")}}"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        
        <script src="{{asset("vendor/color-picker/dist/js/bootstrap-colorpicker.js")}}"></script>
    <script>

        $('.datepicker').datepicker({
            format: "yyyy/mm/dd",
            autoclose: true,
            todayHighlight: true,
        });
        //for csv export

        $(document).ready(function () {

        	function exportTableToCSV($table, filename) {

                var $rows = $table.find('tr:has(td),tr:has(th)'),

                    // Temporary delimiter characters unlikely to be typed by keyboard
                    // This is to avoid accidentally splitting the actual contents
                    tmpColDelim = String.fromCharCode(11), // vertical tab character
                    tmpRowDelim = String.fromCharCode(0), // null character

                    // actual delimiter characters for CSV format
                    colDelim = '","',
                    rowDelim = '"\r\n"',

                    // Grab text from table into CSV formatted string
                    csv = '"' + $rows.map(function (i, row) {
                        var $row = $(row), $cols = $row.find('td,th');

                        return $cols.map(function (j, col) {
                            var $col = $(col), text = $col.text();

                            return text.replace(/"/g, '""'); // escape double quotes

                        }).get().join(tmpColDelim);

                    }).get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim) + '"',



                    // Data URI
                    csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                    console.log(csv);

                	if (window.navigator.msSaveBlob) { // IE 10+
                		//alert('IE' + csv);
                		window.navigator.msSaveOrOpenBlob(new Blob([csv], {type: "text/plain;charset=utf-8;"}), "csvname.csv")
                	}
                	else {
                		$(this).attr({ 'download': filename, 'href': csvData, 'target': '_blank' });
                	}
            }

            // This must be a hyperlink
            $("#xx").on('click', function (event) {

                exportTableToCSV.apply(this, [$('#project'), 'export.csv']);

                // IF CSV, don't do event.preventDefault() or return false
                // We actually need this to be a typical hyperlink
            });

            $("#xxx").on('click', function (event) {

                exportTableToCSV.apply(this, [$('#project1'), 'export.csv']);

                // IF CSV, don't do event.preventDefault() or return false
                // We actually need this to be a typical hyperlink
            });

            $(document).on("click", ".MultiCheckBox", function () {
                var detail = $(this).next();
                detail.show();
            });

            $(document).on("click", ".MultiCheckBoxDetailHeader input", function (e) {
                e.stopPropagation();
                var hc = $(this).prop("checked");
                $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", hc);
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
            });

            $(document).on("click", ".MultiCheckBoxDetailHeader", function (e) {
                var inp = $(this).find("input");
                var chk = inp.prop("checked");
                inp.prop("checked", !chk);
                $(this).closest(".MultiCheckBoxDetail").find(".MultiCheckBoxDetailBody input").prop("checked", !chk);
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();
            });

            $(document).on("click", ".MultiCheckBoxDetail .cont input", function (e) {
                e.stopPropagation();
                $(this).closest(".MultiCheckBoxDetail").next().UpdateSelect();

                var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
                $(".MultiCheckBoxDetailHeader input").prop("checked", val);
            });

            $(document).on("click", ".MultiCheckBoxDetail .cont", function (e) {
                var inp = $(this).find("input");
                var chk = inp.prop("checked");
                inp.prop("checked", !chk);

                var multiCheckBoxDetail = $(this).closest(".MultiCheckBoxDetail");
                var multiCheckBoxDetailBody = $(this).closest(".MultiCheckBoxDetailBody");
                multiCheckBoxDetail.next().UpdateSelect();

                var val = ($(".MultiCheckBoxDetailBody input:checked").length == $(".MultiCheckBoxDetailBody input").length)
                $(".MultiCheckBoxDetailHeader input").prop("checked", val);
            });

            $(document).mouseup(function (e) {
                var container = $(".MultiCheckBoxDetail");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.hide();
                }
            });
        });

        var defaultMultiCheckBoxOption = { width: '220px', defaultText: 'Select Below', height: '200px' };

        jQuery.fn.extend({
            CreateMultiCheckBox: function (options) {

                var localOption = {};
                localOption.width = (options != null && options.width != null && options.width != undefined) ? options.width : defaultMultiCheckBoxOption.width;
                localOption.defaultText = (options != null && options.defaultText != null && options.defaultText != undefined) ? options.defaultText : defaultMultiCheckBoxOption.defaultText;
                localOption.height = (options != null && options.height != null && options.height != undefined) ? options.height : defaultMultiCheckBoxOption.height;

                this.hide();
                this.attr("multiple", "multiple");
                var divSel = $("<div class='MultiCheckBox'>" + localOption.defaultText + "<span class='k-icon k-i-arrow-60-down'><svg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='sort-down' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' class='svg-inline--fa fa-sort-down fa-w-10 fa-2x'><path fill='currentColor' d='M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41z' class=''></path></svg></span></div>").insertBefore(this);
                divSel.css({ "width": localOption.width });

                var detail = $("<div class='MultiCheckBoxDetail'><div class='MultiCheckBoxDetailHeader'><input type='checkbox' class='mulinput' value='-1982' /><div>Select All</div></div><div class='MultiCheckBoxDetailBody'></div></div>").insertAfter(divSel);
                detail.css({ "width": parseInt(options.width) + 10, "max-height": localOption.height });
                var multiCheckBoxDetailBody = detail.find(".MultiCheckBoxDetailBody");

                this.find("option").each(function () {
                    var val = $(this).attr("value");

                    if (val == undefined)
                        val = '';

                    multiCheckBoxDetailBody.append("<div class='cont'><div><input type='checkbox' class='mulinput' value='" + val + "' /></div><div>" + $(this).text() + "</div></div>");
                });

                multiCheckBoxDetailBody.css("max-height", (parseInt($(".MultiCheckBoxDetail").css("max-height")) - 28) + "px");
            },
            UpdateSelect: function () {
                var arr = [];

                this.prev().find(".mulinput:checked").each(function () {
                    arr.push($(this).val());
                });

                this.val(arr);
            },

        });

    </script>


    <script>
  function counter_fn() {
    var counter = document.getElementById("cntr");
    var count = 0;
    count = parseInt(counter.innerHTML);
    count = count + 1;
    counter.innerHTML = count;
  }
  window.onload = counter_fn;
</script>
    @yield('script')

</body>

</html>

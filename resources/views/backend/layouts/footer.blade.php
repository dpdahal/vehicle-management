@section('footer')
    <!-- footer content -->
    <footer>
        <div class="pull-right">
            Developed BY <a href="#">Dp Dahal</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>
    <!-- jQuery -->
    <script src="{{url('backend-assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{url('backend-assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <!-- NProgress -->
    <!-- bootstrap-wysiwyg -->
    <script src="{{url('backend-assets/vendors/moment/min/moment.min.js')}}"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="{{url('backend-assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('backend-assets/tagsinput/src/bootstrap-tagsinput.js')}}"></script>
    <script src="{{url('backend-assets/select2/js/select2.js')}}"></script>

    <script src="{{url('backend-assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('backend-assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script
        src="{{url('backend-assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>


    <script src="{{url('backend-assets/build/js/custom.min.js')}}"></script>
    <script src="{{url('backend-assets/custom/custom.js')}}"></script>

    <script>
        let ckeditorUploadUrl = "{{route('ckeditor-image-upload', ['_token' => csrf_token() ])}}";
        let baseUrl = "{{url('/')}}";
        window.baseUrl = baseUrl;
    </script>




<script>
      $(document).ready(function() {
        
        var statusBtn = document.querySelector('#statusBtn');
        var paymentStatusBtn = document.querySelector('#paymentStatusBtn');
        var statusOptionElem = $("#statusBtn").children("select");
        var paymentOptionElem = $("#paymentStatusBtn").children("select");
        var Url = baseUrl + "/company-backend/";

        // $("#statusBtn").children("select").hide();

        function ajaxCall(type, url, value) {
            return new Promise((resolve, reject)=> {
                $.ajax({
                type: type,
                url: url,
                data: value,
                // contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function() {
                   resolve('OK'); 
                },
                fail: function(err) {
                    reject(err);
                }
            }); 
            })
           
        }

        

        function paymentBtnClick() {
           
        }

        function statusDblClick() {
           jQuery(this).children('p').hide();
           jQuery(this).children('select').show();
        }
        
        function statusOptionElemChanged(event, id) {
            $that = jQuery(this);
            const url = Url+'order/update-status';
            const data = { value: event.target.value, id: $that.attr('data-key')}
            ajaxCall( "POST", url, data)
            .then(res => {
               $that.hide();
               $that.siblings("p").text(data.value).show();
            })
            .catch(err => {
                console.log(err);
            })
        }
        function paymentOptionElemChanged(event) {
            $that = jQuery(this);
            const url =Url+ 'order/update-payment';
            const data = { value: event.target.value, id: $that.attr('data-key')}
            ajaxCall( "POST", url, data)
            .then(res => {
                $that.hide();
               $that.siblings("p").text(data.value).show();
            })
            .catch(err => {
                console.log(err);
            })
        }

        // statusBtn.addEventListener("click", statusBtnClick, false);
        statusBtn.addEventListener("dblclick", statusDblClick, false);
        paymentStatusBtn.addEventListener("dblclick", statusDblClick, false);
        paymentStatusBtn.addEventListener("click", paymentBtnClick, false);
        statusOptionElem.on("change", statusOptionElemChanged);
        paymentOptionElem.on("change", paymentOptionElemChanged);

    });

   
    </script>        

    </body>
    </html>
@endsection

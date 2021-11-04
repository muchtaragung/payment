<html>
<title>Checkout</title>

<head>
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-MK3PDSzfqm48182s"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>


  <form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
    <div> <input type="hidden" name="result_type" id="result-type" value=""></div>
    <div> <input type="hidden" name="result_data" id="result-data" value=""></div>

    <div class="form-group">
      <label for="namaLengkap">Nama Lengkap</label>
      <input type="text" class="form-control" id="namaLengkap" aria-describedby="namaLengkap" required>
    </div>

    <div class="form-group">
      <label for="emailCustomer">Email</label>
      <input type="email" class="form-control" id="emailCustomer" aria-describedby="emailCustomer" required>
    </div>

    <div class="form-group">
      <label for="telpCustomer">Nomor Telpon</label>
      <input type="number" class="form-control" id="telpCustomer" aria-describedby="telpCustomer" required>
    </div>

    <div class="form-group">
      <label for="eventId">Nama Event</label>
      <input type="text" class="form-control" id="eventId" aria-describedby="eventId" value="" required placeholder="">
    </div>

    <div class="form-group">
      <label for="eventId">Harga</label>
      <input type="text" class="form-control" id="eventId" aria-describedby="eventId" value="" required placeholder="">
    </div>

    <button class="btn btn-primary" id="pay-button">Pay!</button>
  </form>


  <script type="text/javascript">
    $('#pay-button').click(function(event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");

      $.ajax({
        url: '<?= site_url() ?>/snap/token',
        cache: false,

        success: function(data) {
          //location = data;

          console.log('token = ' + data);

          var resultType = document.getElementById('result-type');
          var resultData = document.getElementById('result-data');

          function changeResult(type, data) {
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            //resultType.innerHTML = type;
            //resultData.innerHTML = JSON.stringify(data);
          }

          snap.pay(data, {

            onSuccess: function(result) {
              changeResult('success', result);
              console.log(result.status_message);
              console.log(result);
              $("#payment-form").submit();
            },
            onPending: function(result) {
              changeResult('pending', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            },
            onError: function(result) {
              changeResult('error', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            }
          });
        }
      });
    });
  </script>


</body>

</html>
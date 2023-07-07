<div>
    <html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-Sa5V09t80d0Sv8l4"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
  </head>

  <body>
    <div class="row justify-content-center align-items-center">
        <div class="col-12 text-center">
            <button id="pay-button"  class="btn btn-dark position-relative mt-5 w-50 ">Pay!</button>
        </div>
    </div>

    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            window.livewire.emit('result', {
                result
            });
            /* You may add your own implementation here */
          },
          onPending: function(result){
            /* You may add your own implementation here */
          },
          onError: function(result){
            /* You may add your own implementation here */
          },
          onClose: function(){
            /* You may add your own implementation here */
          }
        })
      });
    </script>
  </body>
</html>
</div>

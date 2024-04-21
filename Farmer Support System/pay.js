document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var amount = document.getElementById('amount').value;
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
  
    var options = {
      key: 'rzp_test_9BJ0z9nca8Qlth',
      amount: amount * 100,  // Amount is in paise
      currency: 'INR',
      name: 'Farmer Support',
      description: 'Payment for former support',
      image: 'farmer.png',  // Your logo URL
      handler: function(response) {
        alert('Payment successful!Payment ID: sonunikule@ybl'+ pay_NcQONjBd2p4K11);
        // You can handle the payment success here
      },
      prefill: {
        name: name,
        email: email,
        contact: phone
      },
      theme: {
        color: '#007bff'
      }
    };
  
    var rzp = new Razorpay(options);
    rzp.open();
  });
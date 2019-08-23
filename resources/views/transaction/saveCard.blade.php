<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://js.paystack.co/v2/paystack.js"></script>
      <!-- <script src="script.js"></script> -->
</head>

<body>
    <section class="hero is-fullheight">
        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-4 centerDiv">
                        <div class="media logo">
                            <div class="media-left">
                                <h2>Checkout</h2>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <form id="paystack-card-form" autocomplete="on" method="post">
                                    <div class="field">
                                        <label class="label">Card Number</label>
                                        <p class="control">
                                            <input class="input cc-num" value="" type="tel" placeholder="0000 0000 0000 0000" id="cardNo" required autofocus>
                                        </p>
                                    </div>

                                    <div class="columns is-mobile">
                                        <div class="column is-6 ">
                                            <div class="field">
                                                <label class="label">Expiry Date</label>
                                                <p class="control has-icons-left has-icons-right">

                                                    <input class="input cc-exp" type="tel"    id="expiryDate" value="" placeholder="MM/YY" required>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column is-6">
                                            <div class="field">
                                                <label class="label">CVV</label>
                                                <p class="control has-icons-left has-icons-right">
                                                    <input class="input cc-cvv" type="tel" value="" id="cvv" placeholder="987" required>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="field">
                                        <p class="control">
                                            <button class="button btn-mydefault" type="submit">Add Card </button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script>
var submitFunction = async function(event) {
event.preventDefault();
  var transactionData = {
    email: "{{ auth()->user()->email }}",
    amount: 5000,
    key: "pk_test_e7962bb719a73ee3eb5fe24dfc6a7dd1bba96050"
  };

  var transaction = await Paystack.Transaction.request(transactionData);
  var cardNo = document.getElementById('cardNo').value;
  var cvv = document.getElementById('cvv').value;
  var expiryDate = document.getElementById('expiryDate').value;
  var expiry = expiryDate.split("/");
  console.log(expiry[0]);
  var card = {
    number: cardNo,
    cvv: cvv,
    month: expiry[0],
    year: expiry[1]
  };

  var validation = Paystack.Card.validate(card);

  // validate card
  if (validation.isValid) {
      await transaction.setCard(card);
      var chargeResponse = await transaction.chargeCard();

      // Handle the charge responses
      if (chargeResponse.status === "success") {
        window.location.href = chargeResponse.data.redirecturl;
        console.log(chargeResponse);
          alert("complete");
      }

      // Another charge response example
      if (chargeResponse.status === "auth") {
          const token = 123456;
          const authenticationResponse = await transaction.card.authenticate(token);
          if (authenticationResponse.status === "success") {
              alert("Payment completed!");
          }
      }
  }

};

var form = document.getElementById("paystack-card-form");

form.addEventListener("submit", submitFunction, true);
</script>
</html>

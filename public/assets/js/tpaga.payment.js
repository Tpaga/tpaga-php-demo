var Payments = function() {

  var endpoint = 'https://sandbox.tpaga.co/api/tokenize/credit_card';


  var createToken = function(options, handler) {
    if (!handler) throw new Error("Callback required");
    if (!options['primaryAccountNumber']) throw new Error("You didn't specify a card number");
    if (!options['expirationMonth']) throw new Error("You didn't specify an expiration month");
    if (!options['expirationYear']) throw new Error("You didn't specify an expiration year");
    if (!options['cvc']) throw new Error("You didn't specify a CVC");
    if (!options['cardHolderName']) throw new Error("You didn't specify a card holder name");

    if (!this.publicKey) throw new Error("No publicKey specified. Please call Payments.setPublicKey(...) first");
    if (/^sk_/.test(this.publicKey)) throw new Error("You are using your secret key instead of your public key");

    if (options['expirationMonth'] < 1 || options['expirationMonth'] > 12) throw new Error("Invalid expiration month");
    if (options['expirationYear'] < new Date().getFullYear()) throw new Error("Invalid expiration year");

    var xmlHttp = new XMLHttpRequest();

    xmlHttp.onreadystatechange = function() {
      if (xmlHttp.readyState === 4) {
        if (xmlHttp.status >= 200 && xmlHttp.status < 300) {
          handler(null, JSON.parse(xmlHttp.responseText));
        } else {
          var err = JSON.parse(xmlHttp.responseText)['error'];
          err.status = xmlHttp.status;
          handler(err)
        }
      }
    };

    xmlHttp.open('POST', endpoint, true);
    xmlHttp.setRequestHeader('Authorization', 'Basic ' + btoa(this.publicKey));
    xmlHttp.setRequestHeader('Content-Type', 'application/json');
    xmlHttp.send(JSON.stringify(options));
  }

  var setPublicKey = function(publicKey) {
    this.publicKey = publicKey + ":";
  }

  return {
    createToken: createToken,
    setPublicKey: setPublicKey,
  }
}();
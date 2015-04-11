<?php
    include_once 'session.php';
    include_once 'Braintree.php';
    include_once 'sql.php';
    
    Braintree_Configuration::environment('sandbox');
    Braintree_Configuration::merchantId('2b8dhpbym8wm2c42');
    Braintree_Configuration::publicKey('wtssppnc8q6mg8n7');
    Braintree_Configuration::privateKey('ab7cdccf15bc21c7e0e3ae84f8fdbfd0');
    
    $nonce = $_POST['nonce'];
    $result = Braintree_Transaction::sale(array(
        'amount' => number_format($_POST['amount']/100.0, 2),
        'paymentMethodNonce' => 'nonce-from-the-client'),
        'options' => array('submitForSettlement' => true));
    
    $conn['prepBlob']->bind_param("ddsii",$_POST['lat'],$_POST['long'],$_POST['name'],$_POST['amount'],$_POST['charityid'])
    $conn['prepBlob']->execute();
?>
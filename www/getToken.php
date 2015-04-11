<?php
    include_once 'session.php';
    include_once 'Braintree.php';
    
    Braintree_Configuration::environment('sandbox');
    Braintree_Configuration::merchantId('2b8dhpbym8wm2c42');
    Braintree_Configuration::publicKey('wtssppnc8q6mg8n7');
    Braintree_Configuration::privateKey('ab7cdccf15bc21c7e0e3ae84f8fdbfd0');
    
    echo($clientToken = Braintree_ClientToken::generate());
?>
<?php
mysql_connect('localhost', 'php_user', 'php_pass'); //connect to database
mysql_select_db('cookie_kitchens');

$sql = "SELECT orderID, items, customerID, payment, date, total  FROM orders ORDER BY orderID"; //perform query of required data
$res = mysql_query($sql); 

$xml = new XMLWriter(); //instantiate a new XMLWriter

$xml->openURI("php://output");
$xml->startDocument(); //start xml doc
$xml->setIndent(true);

$xml->startElement('orders'); //first node

while ($row = mysql_fetch_assoc($res)) { //loop through all rows in database
   $xml->startElement("order"); 
    
  $xml->startElement("orderID");// create siblings to orders
  $xml->writeRaw($row['orderID']); //fill siblings with contents of database
  $xml->endElement(); //end of sibling
  
  
  $xml->startElement("items");
  $xml->writeRaw($row['items']);
  $xml->endElement();
  
  
  $xml->startElement("custID");
  $xml->writeRaw($row['customerID']);
  $xml->endElement();
  
  
  $xml->startElement("payment");
  $xml->writeRaw($row['payment']);
  $xml->endElement();
  
    $xml->startElement("date");
  $xml->writeRaw($row['date']);
  $xml->endElement();
  
    $xml->startElement("total");
  $xml->writeRaw($row['total']);
  $xml->endElement();
  
  $xml->endElement(); //end xml
  
}

$xml->endElement();

header('Content-type: text/xml'); //define document type
$xml->flush();
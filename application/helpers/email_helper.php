<?php
function order_mail($order)
{
  // print_r($order);
  if (is_array($order) || is_object($order)) {

    return '

    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

    <h1>Order From Srimitra</h1>
    <table style="width:100%">
    <tr>
    <th>Product</th>
    <th>Product Quantity</th>
 
  </tr>
    
    ';
    foreach ($order as $items) :

      echo '
          <tr>
         
            <td> ' . $items["product_name"] . ' </td>
            <td>' . $items["product_quantity"] . '</td>
          
          </tr>

          ';

    endforeach;

    echo '</table>
    
    
    <h2>Thank You Team Srimitra</h2>
    
    <h2>
    Email: contact@srimitra.com
    Phone: 9516354018
    </h2>';
  }
}

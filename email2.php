<?php
//Connecting with the server
$server = mysqli_connect("localhost","windandc","windand2017") or die('Failed to connect');
$db = mysqli_select_db($server, "windandc_nafuumall_db") or die('Failed to database connect') ;

session_start();  

$session = $_SESSION['sess_array']['1'];

$emessage = "

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
   <head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
      <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
      <title>Nafuumall</title>
      
      <style type='text/css'>
         /* Client-specific Styles */
         div, p, a, li, td { -webkit-text-size-adjust:none; }
         #outlook a {padding:0;} /* Force Outlook to provide a 'view in browser' menu link. */
         html{width: 100%; }
         body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
         /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
         .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
         .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing. */
         #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
         img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
         a img {border:none;}
         .image_fix {display:block;}
         p {margin: 0px 0px !important;}
         table td {border-collapse: collapse;}
         table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
         a {color: #33b9ff;text-decoration: none;text-decoration:none!important;}
         /*STYLES*/
         table[class=full] { width: 100%; clear: both; }
         /*IPAD STYLES*/
         @media only screen and (max-width: 640px) {
         a[href^='tel'], a[href^='sms'] {
         text-decoration: none;
         color: #33b9ff; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^='tel'], .mobile_link a[href^='sms'] {
         text-decoration: default;
         color: #33b9ff !important;
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 440px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
         img[class=banner] {width: 440px!important;height:220px!important;}
         img[class=col2img] {width: 440px!important;height:220px!important;}
         
         
         }
         /*IPHONE STYLES*/
         @media only screen and (max-width: 480px) {
         a[href^='tel'], a[href^='sms'] {
         text-decoration: none;
         color: #33b9ff; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^='tel'], .mobile_link a[href^='sms'] {
         text-decoration: default;
         color: #33b9ff !important; 
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 280px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
         img[class=banner] {width: 280px!important;height:140px!important;}
         img[class=col2img] {width: 280px!important;height:140px!important;}
         
        
         }
      </style>
   </head>
   <body>
<!-- Start of preheader -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='preheader' >
   <tbody>
      <tr>
         <td>
            <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
               <tbody>
                  <tr>
                     <td width='100%'>
                        <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
                           <tbody>
                              <!-- Spacing -->
                              <tr>
                                 <td width='100%' height='20'></td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td width='100%' align='left' valign='middle' style='font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #282828' st-content='preheader'>
                                    Can't see this Email? View it in your <a href='#' style='text-decoration: none; color: #A8CE58'>Browser </a> 
                                 </td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td width='100%' height='20'></td>
                              </tr>
                              <!-- Spacing -->
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of preheader --> 
<!-- Start of seperator -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='seperator'>
   <tbody>
      <tr>
         <td>
            <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='devicewidth'>
               <tbody>
                  <tr>
                     <td align='center' height='30' style='font-size:1px; line-height:1px;'>&nbsp;</td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of seperator --> 
<!-- Start of main-banner -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='banner'>
   <tbody>
      <tr>
         <td>
            <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
               <tbody>
                  <tr>
                     <td width='100%'>
                        <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='devicewidth'>
                           <tbody>
                              <tr>
                                 <!-- start of image -->
                                 <td align='center' st-image='banner-image'>
                                    <div class='imgpop'>
                                       <img src='www.nafuumall.com/_email/nafuumall_logo.png' height='130px' width='130px' /><h3 style='font-style:bold;color:#A8CE58; '>Nafuumall</h3>
                                       <h3 class='collapse'>THANKS FOR YOUR ORDER</h3>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <!-- end of image -->
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of main-banner -->  
<!-- Start of seperator -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='seperator'>
   <tbody>
      <tr>
         <td>
            <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='devicewidth'>
               <tbody>
                  <tr bgcolor='#A8CE58'>
                     <td align='left' height='30' style='font-size:20px; line-height:20px;'>&nbsp;<b>ORDER & SHIPPING INFO</b></td>
                  </tr>
                  <tr>
                     <td style='font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #282828; text-align:left; line-height: 24px;'>";
                    
                  $select = mysqli_query($server, "SELECT * FROM `delivery_address` WHERE session='$session'") or die(mysql_error());
                  while ($co=mysqli_fetch_array($select)) 
                  {
                     $emessage2 = "
                     <p><b>Name: </b> $co[4] </p>
                     <p><b>Order no:</b> $co[0] </p>
                     <p><b>Email:</b> $co[3]</p>
                     <p><b>Phone no:</b> $co[6] </p>
                     <p><b>Region:</b> $co[7] </p>
                     <p><b>Area:</b> $co[8]</p>
                     <p><b>Exact Location:</b> $co[9] </p>";   
                  
                     $shippingCost = $co[10];
                     
                  }
                     $emessage3="                 
                     </td>
                  </tr>

                  <tr bgcolor='#A8CE58'>
                     <td align='left' height='30' style='font-size:20px; line-height:20px;'>&nbsp;<b>ITEMS ORDERED</b></td>
                  </tr>

                  <tr>
                     <td style='font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #282828; text-align:left; line-height: 24px;'>
                        <table width='600' align='center' cellspacing='0' cellpadding='0' border='1' class='devicewidth''>
                              <tr align='left'>
                                 <th>---</th>
                                 <th>Name</th>
                                 <th>Qty</th>
                                 <th>Total</th>
                              </tr>";

                                 $emessage4 = '';
                                 $ress= mysqli_query($server, "SELECT * FROM ordered_products WHERE session='$session'");
                                    mysqli_data_seek($ress, 0);
                                     while($colms=mysqli_fetch_array($ress, MYSQLI_NUM))
                                     {
                                 $emessage4 .=
                                          "                          
                              <tr align='left'>
                                 <td><img src='www.nafuumall.com/e_images/$colms[8]' height='auto' width='50px'></td>
                                 <td>$colms[2]</td>
                                 <td >$colms[9]</td>
                                 <td>ksh.$colms[5]</td>
                               </tr>";
                         }                        

                        $emessage5 = "
                        </table>
                     </td>
                  </tr>
                  <tr bgcolor='#A8CE58'>
                     <td align='left' height='30' style='font-size:20px; line-height:20px;'>&nbsp;<b>PURCHASE SUMMARY</b></td>
                  </tr>
                  <tr>
                        <td style='font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #282828; text-align:left; line-height: 24px;'>";


                     $selectS = mysqli_query($server, "SELECT * FROM `collective_order` WHERE session ='$session'") or die(mysql_error());
                        while ($colm = mysqli_fetch_array($selectS)) {

                           $totl = ($colm[3]+$shippingCost)-0; 

                           $emessage6 = "
                     <p><b>No. of Items: </b>$colm[2]</p>
                     <p><b>Subtotal:</b> ksh.".number_format($colm[3])."</p>
                     <p><b>VAT:</b> Inclusive</p></br>
                     <p><b>Discount: ksh.</b>".number_format(0)."</p>
                     <p><b>Shipping:</b> ksh.".number_format($shippingCost)."</p>
                     <p><b>Points awarded:</b> $colm[9]</p><br/>
                     <p><b>Total:</b> ksh.".number_format($totl)."</p>" ;

                        }
                      $emessage7="     
                      </td>
                  </tr>
                  <tr bgcolor='#A8CE58'>
                     <td align='left' height='30' style='font-size:20px; line-height:20px;'>&nbsp;<b></b></td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of seperator -->   

<!-- start of Full text -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='full-text'>
   <tbody>
      <tr>
         <td>
            <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
               <tbody>
                  <tr>
                     <td width='100%'>
                        <table bgcolor='#ffffff' width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
                           <tbody>
                              <!-- Spacing -->
                              <tr>
                                 <td height='20' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td>
                                    <table width='560' align='center' cellpadding='0' cellspacing='0' border='0' class='devicewidthinner'>
                                       <tbody>
                                          <!-- Title -->
                                          <tr>
                                             <td style='font-family: Helvetica, arial, sans-serif; font-size: 18px; background-color:#ECF8FF; text-align:center; line-height: 24px;'>
                                                Thank you for making your order. You will receive a call from one of our agents notifying you when your order is ready for shipment. For more products checkout our website:<br/> <a href='www.nafuumall.com'>Click it! &raquo;</a><br/><br/>										<p align='left'>For any inquiries contact us on:<br/>Phone: <strong><a href='callto:+254792176174'>(+254) 792 176 174</a></strong><br/>
                Email: <strong><a href='emailto:info@nafuumall.com'>info@nafuumall.com</a></strong><br/>
                Website: <strong><a href='www.nafuumall.com'>www.nafuumall.com</a></strong></p>
                                             </td>
                                          </tr>
                                          <!-- End of Title -->
                                          <!-- spacing -->
                                          <tr>
                                             <td width='100%' height='15' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                                          </tr>
                                          <!-- End of spacing -->
                

                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td height='20' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of Full Text -->

<!-- Start of footer -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='footer'>
   <tbody>
      <tr>
         <td>
            <table width='600' bgcolor='#A8CE58' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
               <tbody>
                  <tr>
                     <td width='100%'>
                        <table bgcolor='#A8CE58' width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
                           <tbody>
                              <!-- Spacing -->
                              <tr>
                                 <td height='10' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td>
                                    <!-- Social icons -->
                                    <table  width='150' align='center' border='0' cellpadding='0' cellspacing='0' class='devicewidth'>
                                       <tbody>
                                          <tr>
                                             <td width='43' height='43' align='center'>
                                                <div class='imgpop'>
                                                   <a target='_blank' href='www.facebook.com/nafuumall'>
                                                   <img src='www.nafuumall.com/_email/facebook.png' alt=' border='0' width='43' height='43' style='display:block; border:none; outline:none; text-decoration:none;'>
                                                   </a>
                                                </div>
                                             </td>
                                             <td align='left' width='20' style='font-size:1px; line-height:1px;'>&nbsp;</td>
                                             <td width='43' height='43' align='center'>
                                                <div class='imgpop'>
                                                   <a target='_blank' href='www.twitter.com/nafuumall'>
                                                   <img src='www.nafuumall.com/_email/twitter.png' alt=' border='0' width='43' height='43' style='display:block; border:none; outline:none; text-decoration:none;'>
                                                   </a>
                                                </div>
                                             </td>
                                             <td align='left' width='20' style='font-size:1px; line-height:1px;'>&nbsp;</td>
                                             <td width='43' height='43' align='center'>
                                                <div class='imgpop'>
                                                   <a target='_blank' href='www.instagram.com/nafuumall'>
                                                   <img src='www.nafuumall.com/_email/instagram.png' alt='instagram page' border='0' width='43' height='43' style='display:block; border:none; outline:none; text-decoration:none;'>
                                                   </a>
                                                </div>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <!-- end of Social icons -->
                                 </td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td height='10' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of footer -->
<!-- Start of Postfooter -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='postfooter' >
   <tbody>
      <tr>
         <td>
            <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
               <tbody>
                  <!-- Spacing -->
                  <tr>
                     <td width='100%' height='20'></td>
                  </tr>
                  <!-- Spacing -->
                  <tr>
                    <!-- <td align='center' valign='middle' style='font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #282828' st-content='preheader'>
                        Don't want to receive email Updates? <a href='#' style='text-decoration: none; color: #A8CE58'>Unsubscribe here </a> 
                     </td>-->
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of postfooter -->      
   </body>
   </html>";
  // echo $emessage ."$emessage2". $emessage3 ."$emessage4". $emessage5 ."$emessage6". $emessage7;
?>
<style>
img.g-img + div {
       display:none !important;
   }
   .button-link {
       text-decoration: none !important;
   }
   .button-td,
   .button-a {
       transition: all 100ms ease-in;
   }
   .button-td:hover,
   .button-a:hover {
       background: #555555 !important;
       border-color: #555555 !important;
   }
   .button-td,
   .button-a {
       transition: all 100ms ease-in;
   }
   .button-td:hover,
   .button-a:hover {
       background: #555555 !important;
       border-color: #555555 !important;
   }

   /* Media Queries */
   @media screen and (max-width: 620px) {
       .email-container p {
           font-size: 14px !important;
           line-height: 26px !important;
       }
   }
   @media screen and (max-width: 480px) {
        td[class="split-mob-1"] {
           padding-right:10px !important;
        }
         td[class="split-mob-3"] {
           padding-right:10px !important;
        }
   }
   @media screen and (max-width: 375px) {
        img[class="banner"] {
           width: 100% !important;
           max-width: 100% !important;
           height: auto !important;
       }
       table[class="container"]{
           width:320px !important;
           }
        td[class="split-mob-1"] {
           padding-bottom:15px !important;
           display:block !important;
           width:100% !important;
        }
         td[class="split-mob-2"] {
           display:block !important;
           width:100%; !important;
        }
        td[class="split-mob-3"] {
           display:block !important;
           width:100%; !important;
        }
        td[class="split-mob-4"] {
           display:block !important;
           width:100%; !important;
        }
       .email-container p {
           font-size: 13px !important;
           line-height: 25px !important;
       }
       .header-td{
           padding: 20px 15px 15px 20px !important;;
           font-family: 'Poppins', sans-serif !important;;
           }
       td.services-td-1{
           padding: 10px 20px 15px 20px !important;;
           font-family: 'Poppins', sans-serif !important;;
           }
       .services-td-2{
           padding: 10px 20px 15px 20px !important;;
           font-family: 'Poppins', sans-serif !important;;
           }
       .cta-bg-1 {
           background: #4285f4 !important;;
           padding: 40px 0px 15px 0px !important;;
           font-family: 'Poppins', sans-serif !important;;
           text-align: center !important;;
       }
       .cta-h1{
           color: #ffffff !important;
           font-family: "Poppins",sans-serif !important;
           font-size: 24px !important;
           font-weight: 600 !important;
           line-height: 40px !important;
           margin: 0 0 10px !important;
           }
   }

</style>

<!--[if gte mso 9]>
<xml>
 <o:OfficeDocumentSettings>
   <o:AllowPNG/>
   <o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml>
<![endif]-->

</head>
<body width="100%" bgcolor="#f9f9f9" style="margin: 0; mso-line-height-rule: exactly;">
<center style="width: 100%; background: #f9f9f9; text-align: left;">

   <!-- Visually Hidden Preheader Text : BEGIN -->
   <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: 'Poppins', sans-serif;">

   </div>
   <!-- Visually Hidden Preheader Text : END -->

   <!--
       Set the email width. Defined in two places:
       1. max-width for all clients except Desktop Windows Outlook, allowing the email to squish on narrow but never go wider than 620px.
       2. MSO tags for Desktop Windows Outlook enforce a 620px width.
   -->
   <div style="max-width: 620px; margin: auto;" class="email-container">
       <!--[if mso]>
       <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="620" align="center">
       <tr>
       <td>
       <![endif]-->

       <!-- Email Header : BEGIN --><!-- Email Header : END -->

       <!-- Email Body : BEGIN -->
       <table class="container" role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 620px;">

           <!-- Banner Image: BEGIN -->
           <tr>
               <td bgcolor="#ffffff">
                   <img src="https://certificadoscolombia.com/public/images/Demo.png" aria-hidden="true" width="120" alt="alt_text" border="0" align="center" style="max-width: 620px; height: auto; background: #f9f9f9; font-family: 'Poppins', sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
               </td>
           </tr>
           <!-- Banner Image: END -->

           <!-- 1 Column Text + Button : BEGIN -->
           <tr>
               <td bgcolor="#ffffff">
                   <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
                       <tr>
                           <td class="header-td" style="padding:40px 60px 30px 40px; font-family: 'Poppins', sans-serif;">
                               <h3 class="h1-title" style="margin: 0 0 10px 0; font-family: 'Poppins', sans-serif; font-size: 24px; line-height: 42px; color: #111111; font-weight: 600;">
                               <a href="#" class="h1-title-a" style="color: #111111; text-decoration: none;">
                               Nuevo proveedor registrado en proveedoresDemo.com</a></h3> <br>
                               <p class="header-p" style="margin: 0; font-size: 14px;">
                               <strong>Empresa: {{$Empresa}},<br>
                               <strong>Nit: {{$Nit}},<br>
                               <strong>Email:</strong> {{$email}},<br>
                               <strong>Teléfono:</strong> {{$Tel}},<br>
                               <strong>Ciudad:</strong> {{$Ciudad}}.<br>
                               El nuevo proveedor se encuentra a la espera de la ativación en el sistema.

                               Cordialmente,

                               Demo S.A.
                               </p>
                           </td>
                   </table>
               </td>
           </tr>
           <!-- 1 Column Text + Button : END -->

           <!-- 2 Even Columns : BEGIN -->
           <!-- Two Even Columns : END -->
           <tr>

           </tr>
           <!-- Two Even Columns : END -->
            <!-- Call to action : Start -->
                       <tr>
                       </tr>
     </table>
 </div>
</body>
</html>

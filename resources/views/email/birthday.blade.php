<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <style type="text/css">
    <style type="text/css">
      

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
                margin: 5px 0;
            }
            td {font-weight: 500 !important;}
            td.emailContent {padding: 0 10px 10px !important;}
        }
        @media screen and (max-width:320px) {
            .footerP, .footerSocial {width: 100% !important;}
            .footerP {text-align: center !important;}
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <table border="0" cellpadding="0" cellspacing="0" style="width:100%;max-width: 600px;margin: 20px auto;box-shadow: 0 8px 30px rgb(0 0 0 / 20%);">
        <tr>
            <td class="emailContent" bgcolor="" align="center" style="">
                <table border="0" cellpadding="0" cellspacing="0" style="width:100%;max-width: 600px;box-shadow: 0 8px 30px rgb(0 0 0 / 15%);margin: 20px auto;">
                	<tr>
                        <td  align="center" valign="top" style="padding: 40px 0 0;background: url({{ asset('assets/images/service_shape-top.png') }});background-repeat: no-repeat;    background-size: 38% 100%;position: relative;background-color: #fff;">
                            <a href="{{url('/')}}" style=""><img style="width: 100%;max-width: 40%;" src="{{ asset('assets/images/logo.png') }}" alt=""/></a>
                        </td>
                    </tr>
                <tr>
                    <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 0px 30px;font-family: 'Nunito', sans-serif;font-size: 24px;line-height: 25px;">
                        <div class="" style="text-align: center;"><a href="#" style="color: #232323;text-decoration: none;font-weight: 400;">Welcome to Remindio!</a>
                        </div>
                    </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 40px 30px 0px 30px;font-family: 'Nunito', sans-serif;">
                            <p style="margin: 0;font-size: 16px;font-weight: 400;color: #232323;">
                            	@foreach ($user as $data)
                                Hi {{$data['username']}},
                                 @break
                            	@endforeach</p>
                        </td>
                    </tr>
                    <tr>
                       <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 0px 30px;font-family: 'Nunito', sans-serif;">
                            <p style="margin: 0;font-size: 16px;font-weight: 400;color: #232323;">Thanks a lot for choosing Remindio.</p>
                        </td>
                    </tr>
                    <tr>
                       <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 0px 30px;font-family: 'Nunito', sans-serif;">
                           <table style="width: 100%;">
                           	<thead>
                           		<tr style="border-top: 1px solid #dee2e6;">
	                           		<th style="font-size: 12px;font-weight: 700;text-transform: uppercase;padding: .75rem .75rem;text-align: left;">Date</th>
	                           		<th style="font-size: 12px;font-weight: 700;text-transform: uppercase;padding: .75rem .75rem;text-align: left;">Name</th>
	                           		<th style="font-size: 12px;font-weight: 700;text-transform: uppercase;padding: .75rem .75rem;text-align: left;">Phone Number</th>
	                           		<th style="font-size: 12px;font-weight: 700;text-transform: uppercase;padding: .75rem .75rem;text-align: left;">Event Type</th>
	                           	</tr>
                           	</thead>
                           	<tbody>
                           		@foreach($user as $data)
                           		<tr style="border-top: 1px solid #dee2e6;">
                           			
                           			<td style="font-size: 12px;font-weight: 400;text-transform: uppercase;padding: .75rem .75rem;text-align: left;">{{$data['date']}}</td>
	                           		<td style="font-size: 12px;font-weight: 400;text-transform: uppercase;padding: .75rem .75rem;text-align: left;">{{$data['name']}}</td>
	                           		<td style="font-size: 12px;font-weight: 400;text-transform: uppercase;padding: .75rem .75rem;text-align: left;">{{$data['phone']}}</td>
	                           		<td style="font-size: 12px;font-weight: 400;text-transform: uppercase;padding: .75rem .75rem;text-align: left;">{{$data['eventType']}}</td>
									
	                           		
                           		</tr>
                           		@endforeach
                           	</tbody>
                           </table>
                        </td>
                    </tr> 
                    <!-- <tr>
                        <td bgcolor="#ffffff" align="center" style="padding: 40px 30px 0px 30px;font-family: 'Nunito', sans-serif;">
                        <a href="#" style="background: #00abe1;border:1px solid #00abe1;padding: 12px 30px 12px 30px;font-size: 18px;font-weight: 500;color: #fff;border-radius: 30px;box-shadow: 8px 8px 18px 0 rgb(0 171 225 / 30%);display: inline-block;position: relative;text-decoration: unset;">Create Account</a></td>
                    </tr> -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 40px 30px 0px 30px;font-family: 'Nunito', sans-serif;">
                         <p style="margin: 0;font-size: 16px;font-weight: 400;color: #232323;">If you have any questions, feel free to reach back to you us.</p>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 40px 30px 40px 30px;font-family: 'Nunito', sans-serif;background: url({{ asset('assets/images/service_shape.png') }});    background-repeat: no-repeat;background-position: right;   background-color: #fff;background-size: 43% 100%;">
                         <p style="margin: 0;font-size: 16px;font-weight: 400;color: #232323;">Thanks,</p>
                         <p style="margin: 0;font-size: 16px;font-weight: 400;color: #232323;">Remindio Team</p>

                    </tr>
                </table>
                </td>
            </tr>
        </table>
    </body>
</html>


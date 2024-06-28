<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        #invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 244mm;
  background: #e3e3e3;
  
  
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: 1.2em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: 1.2em;
  color: #000000;
  line-height: 1.2em;
}
 
#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #000000;
}

#top{min-height: 100px;}
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
	background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
	background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;} 
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE
}
.tabletitle{
  //padding: 5px;
  font-size: 1.2em;
  background: #EEE;
}
.service{border-bottom: 1px solid #000000;}
.item{
    width: 70mm;
    color: #000000

}
.Hours{
    color: #000000;

}
.Rate{
    color: #000000;
}

.itemtext{font-size: 1.2em;}
.bold-text{
  font-weight: bold;
  font-size: 1.2em;
  color: #000000
  
}

#legalcopy{
  margin-top: 5mm;
}

  
  
}
    </style>
    
  <div id="invoice-POS">
    
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2 class="bold-text">Manage Syndic</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
        <h2 class="bold-text">Contact Info</h2>
        <p> 
            Monthly Contrubtion : {{$data->resident->monthly_contrubtion}}  MAD</br>
            Apartment Number : {{$data->resident->apartment_number}}</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="item"><h2>Resident</h2></td>
								<td class="item"><h2>Syndic</h2></td>
								<td class="Hours"><h2>Date</h2></td>
								<td class="Rate"><h2>Price</h2></td>
							</tr>

							<tr class="service">
								<td class="tableitem"><p class="itemtext">{{$data->resident->user->first_name}}{{$data->resident->user->last_name}}</p></td>
								<td class="tableitem"><p class="itemtext">{{$data->syndic->user->first_name}}{{$data->syndic->user->last_name}}</p></td>
								<td class="tableitem"><p class="itemtext">{{$data->date}}</p></td>
								<td class="tableitem"><p class="itemtext">{{$data->price}}</p></td>
							</tr>


						</table>
					</div><!--End Table-->

					<div id="legalcopy">
						<p class="legal"><strong>Thank you for your contribution!</strong> 
                            {{-- more text --}}
						</p>
					</div>

				</div><!--End InvoiceBot-->
  </div><!--End Invoice-->

</body>
</html>
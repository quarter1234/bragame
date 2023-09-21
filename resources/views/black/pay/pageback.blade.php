<html lang="zh-Hans">
  
  <head>
    <meta charset="utf-8">
    @include('mobile.common.common_title') 
    <base href="/">
    <!-- Material Icons -->
    <link rel="stylesheet" href="/static/css/material-icons.css">
    <link rel="stylesheet" href="/static/css/styles.4917b6f03b8811030eaf.css">
    <link rel="stylesheet" href="/static/css/DINAlternate-bold.css">
    <link rel="stylesheet" href="/mobile/blue/css/activity.css">
    <link rel="stylesheet" href="/mobile/blue/css/share.css">
    <!-- Used in supported Android browsers -->
 

    <meta name="theme-color" content="#1e366b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fixed position has issue with iOS Safari using black-translucent -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
     <!-- Meta Pixel Code -->
     <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    </script>
    <!-- End Meta Pixel Code -->
    </head>

  <body style="color: white; background-color: #1e366b;">
      <div class="fk_ico"><img src='/mobile/blue/images/dg_yq.png'></div>
      <div class="fk_text_1">
        <h2 id="h2-pay">O pagamento foi concluído！</h2>
        <p id="p-pay">O pagamento foi concluído, por favor, preste atenção</p>
      </div>
   <script>

  var payTimer = null;
  var req_count = 5;

  function getOrderInfo(orderid)
  {
    if(req_count > 0){
      $.ajax({
          url : "{{url('mobile/pay/queOrder')}}",
          type : 'POST',
          data : {orderid: orderid},
          success : function (data) {
            if(data.code == 200) {
              if(data.data){
                console.log("order-data:", data.data)
                setPayOptByStatus(data.data.status)
              }
            }
            else{ // 请求失败
              clearTimeOut()
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            
          }
        })
    }
    req_count--
    console.log("req_count:", req_count)
  }

  function clearTimeOut(){
    if(payTimer != null) {
      clearInterval(payTimer);
    }
	}

  function setPayOptByStatus(status){
    if(status >= 2){
          clearTimeOut()
          $('#h2-pay').text('Pagamento efetuado com sucesso')
          $('#p-pay').text('O pagamento foi realizado com sucesso')
          fbq('init', '1309983866312683');
          fbq('track', 'Purchase', {value:0.00, currency:'USD'})
			}
      else{
       
      }
  }

   $(function(){
        var url = window.location.href; //获取当前页面的URL
        var urlObj = $.url(url); //将URL解析成一个对象
        var params = urlObj.params;//将URL参数解析成JS对象
        var orderid = params.orderid;//获取q参数的值
        if(orderid != '' && orderid != undefined)
        {
          if(!payTimer && orderid){
            payTimer = setInterval(getOrderInfo, 1000, orderid);
          }
        }
    })
   </script>
  </body>

</html>

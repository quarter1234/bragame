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
    </head>

  <body style="color: white; background-color: #1e366b;">
      <div class="fk_ico"><img src='/mobile/blue/images/dg_yq.png'></div>
      <div class="fk_text_1">
        <h2>O pagamento foi concluído！</h2>
        <p>O pagamento foi concluído, por favor, preste atenção</p>
      </div>
   <script>

  function getOrderInfo(orderid)
  {
    $.ajax({
          url : "{{url('mobile/register')}}",
          type : 'POST',
          data : {orderid: orderid},
          success : function (data) {
            if(data.code == 200) {
              
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            
          }
        })
  }

   $(function(){
        var url = window.location.href; //获取当前页面的URL
        var urlObj = $.url(url); //将URL解析成一个对象
        var params = urlObj.params;//将URL参数解析成JS对象
        var orderid = params.orderid;//获取q参数的值
        if(orderid != '' && orderid != undefined)
        {
          getOrderInfo(orderid)
        }
    })
   </script>
  </body>

</html>

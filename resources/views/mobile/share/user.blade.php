<div class="yh_top">
        <div class="yh_t_list">
            <h2>{{ $invite['one_grade_count'] }}</h2>
            <p>Convite nível 1{{--一级邀请--}}</p>
        </div>
        <div class="yh_t_list">
            <h2>{{ $invite['two_grade_count'] }}</h2>
            <p>Convite nível 1{{--二级邀请--}}</p>
        </div>
</div>

{{--loading组件--}}
@include('mobile.common.loading')

<div class="yh_table">
    <table>
        <thead>
        <tr>
            <td>NO</td>
            <td>prenome</td>
            <td>série</td>
            <td>tempo</td>
        </tr>
        </thead>
        <tbody>
        @foreach($invite['list'] as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item['descendant']['playername'] }}</td>
            <td>{{ $item['ancestor_h'] }}</td>
            <td>{{ $item['descendant']['create_time'] }}</td>
        </tr>
        @endforeach  
        </tbody>
    </table>
    
    <div style="width:100%;text-align:center;margin-top:1rem">
        <button id="pg_load_more" page="0" onclick="loadInvites()"  style="color:#fff; font-size:14px;">{{--点击加载更多--}}Clique para carregar mais</button>
    </div>

</div>

<script>
    function loadInvites() {
        let page = $('#pg_load_more').attr('page');
          showLoading();
          $.ajax({
              url : "{{url('mobile/share/invites')}}",
              type : 'GET',
              data : {page: parseInt(page) + 1},
              success : function (data) {
                hideLoading();
                $('#pg_load_more').attr('page', data.data.current_page);
                data.data.data.forEach(element => {
                  let itemGame = '<a><img _ngcontent-avh-c16="" gameid="'+element.id+'" class=" generic-background-image pg_game_go ng-star-inserted" src="'+element.icon+'" /></a>'
                  $('#tab2_content_pgs').append(itemGame)
                })
              }
          })
    }
    
    $(document).ready(function() {
            loadInvites();  
    })
</script>
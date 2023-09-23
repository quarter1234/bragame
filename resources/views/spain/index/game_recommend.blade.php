<div style="text-align:center;">
    <div class="game_qb_title">
        <div class="game_qb_left">
          Popular
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(9)">Ver todos</a>
        </div>
    </div>
    {{--游戏放这里 喜欢的--}}
    <div class="game_list rm">
    @foreach($favorRecommend as $item)
        <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
    @endforeach      
    </div>
    {{----}}
    <div class="game_qb_title">
        <div class="game_qb_left">
          In-PG
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(2)">Ver todos</a>
        </div>
    </div>
    {{--游戏放这里 PG--}}
    <div class="game_list">
    @foreach($pgRecommend as $item)
        <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
    @endforeach   
    </div>
    {{----}}
    <div class="game_qb_title">
        <div class="game_qb_left">
            In-PP
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(1)">Ver todos</a>
        </div>
    </div>
    {{--游戏放这里--}}
    <div class="game_list">
    @foreach($ppRecommend as $item)
        <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
    @endforeach   
    </div>

    {{----}}
    <div class="game_qb_title">
        <div class="game_qb_left">
           In-Tada
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(3)">Ver todos</a>
        </div>
    </div>
    {{--游戏放这里--}}
    <div class="game_list">
    @foreach($getTadaRecommend as $item)
        <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
    @endforeach   
    </div>
</div>
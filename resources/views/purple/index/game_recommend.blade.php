<div style="text-align:center;">
    <div class="game_qb_title">
        <div class="game_qb_left">
            Popular
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(9)">Ver tudo</a>
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
            <a href="#navigations" style="text-decoration:none" onclick="myclick(2)">Ver tudo</a>
        </div>
    </div>
    {{--游戏放这里 PG--}}
    <div class="game_x">
    <div class="game_xx">
    @foreach($pgRecommend as $item)
        <img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" />
    @endforeach   
    </div>
    </div>
    {{--
    <div class="game_qb_title">
        <div class="game_qb_left">
            In-Tada1
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(3)">Ver tudo</a>
        </div>
    </div>--}}
    {{--游戏放这里--}}
    <div class="game_list">
            
    </div>


    {{----}}
    <div class="game_qb_title">
        <div class="game_qb_left">
            In-PP
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(1)">Ver tudo</a>
        </div>
    </div>
    {{--游戏放这里--}}
    <div class="game_x">
    <div class="game_xx">
    @foreach($ppRecommend as $item)
        <a><img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" /></a>
    @endforeach   
    </div>
    </div>
    {{----}}
    <div class="game_qb_title">
        <div class="game_qb_left">
            In-Tada
        </div>
        <div class="game_qb_left" style="text-align:right;">
            <a href="#navigations" style="text-decoration:none" onclick="myclick(3)">Ver tudo</a>
        </div>
    </div>
    {{--游戏放这里--}}
    <div class="game_x">
    <div class="game_xx">
    @foreach($getTadaRecommend as $item)
        <img _ngcontent-avh-c16="" gameid="{{ $item['id'] }}" class=" generic-background-image pg_game_go ng-star-inserted" src="{{ $item['icon'] }}" />
    @endforeach   
    </div>
    </div>
</div>
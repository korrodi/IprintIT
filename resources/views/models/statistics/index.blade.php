<a id="statistics"></a>
@if(isset($statisticData))
    <div class="alert alert-warning">
        <strong>Epá!</strong> numeroImpressoesDiarias, numeroImpressoesMensais, estão a ser passadas como Objeto
    </div>
    <div class="row">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <span class="count">{{ $statisticData['totalImpressoes'] }}</span>
                <p>Total Prints!</p>
            </div>
            <div class="btn-group">
            <div>
                <span class="count">{{ $statisticData['pb'] }}</span><span>/</span>
                <span class="count">{{ $statisticData['cores'] }}</span>
                <div class="clear"></div>
                <p>Black White % Color</p>
            </div>
            </div>
            <div class="btn-group">
                <span class="count">{{ $statisticData['pbpercent'] }}</span>
                <p>% Black White</p>
            </div>
            <div class="btn-group">
                <span class="count">{{ $statisticData['corespercent'] }}</span>
                <p>% Color</p>
            </div>
            <div class="btn-group">
                <span class="count">{{-- $statisticData['numeroImpressoesDiarias'] --}}</span>
                <p>Statistics</p>
            </div>
            <div class="btn-group">
                <span class="count">{{-- $statisticData['numeroImpressoesMensais'] --}}</span>
                <p>Events</p>
            </div>
        </div>
    </div>
@else
    <h2>No statistics found</h2>
@endif

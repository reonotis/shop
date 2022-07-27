
@props(['log' => NULL ])


<div class="log-contents" >
    <div class="log-number-line" ></div>
    <div class="log-number" >
        <?php echo ($log->num)?  $log->num :  "-";   ?>
    </div>
    <div class="log-content" >
        <div class="log-date" >{{ $log->date }}</div>
        <div class="flex" >
            <div class="log-time flex" >
                <div class="entry_time" >
                    {{ $log->entry_time->format('H:i') }}
                </div>
                <div class="" >～</div>
                <div class="exit_time" >
                    {{ $log->exit_time->format('H:i') }}
                </div>
                <div class="swim_time" >
                    <?php
                        $first = new \Carbon\Carbon(date('Y-m-d').' 00:00:00');
                        $swimTime = new \Carbon\Carbon( $log->swim_time);
                    ?>
                    {{ $first->diffInMinutes($swimTime) }}分
                </div>
            </div>
            <div class="flex svg-contents-parent" >
                <div class="w-16 svg-contents" content-wrapper="entry" >
                    <div class="icon walk-icon">
                        <x-common.svg.list pattern="entry" :value="$log->entry"/>
                    </div>
                    {{ __(App\Consts\Common::ENTRY_LIST[$log->entry]) }}
                </div>
                <div class="w-16 svg-contents" content-wrapper="wether" >
                    <div class="icon walk-icon">
                        <x-common.svg.list pattern="wether" :value="$log->wether"/>
                    </div>
                    {{ __(App\Consts\Common::WETHER_LIST[$log->wether]) }}
                </div>
                <div class="w-16 svg-contents" content-wrapper="wave" >
                    <div class="icon walk-icon">
                        <x-common.svg.list pattern="wave" :value="$log->wave"/>
                    </div>
                    {{ __(App\Consts\Common::WAVE_LIST[$log->wave]) }}
                </div>
                <div class="w-16 svg-contents" content-wrapper="flow" >
                    <div class="icon walk-icon">
                        <x-common.svg.list pattern="flow" :value="$log->flow"/>
                    </div>
                    {{ __(App\Consts\Common::FLOW_LIST[$log->flow]) }}
                </div>
                <div class="w-16 svg-contents" content-wrapper="wind" >
                    <div class="icon walk-icon">
                        <x-common.svg.list pattern="wind" :value="$log->wind"/>
                    </div>
                    {{ __(App\Consts\Common::WIND_LIST[$log->wind]) }}
                </div>
            </div>
        </div>

    </div>
</div>
<?php
function hein_time($time = null, $type = '')
{
    // $mm_time = new DateTimeZone('Asia/Rangoon');
    // $datetime->setTimezone($mm_time);
    // $datetime->
    // $time=get_the_time().' '.get_the_date();	

    $time_int = $time == null || $time == '' ? get_post_time('U', true) : $time;
    $now_int = strtotime(date("H:i:s d-M-Y"));

    $time_dif = $now_int - $time_int;
    $year = 60 * 60 * 24 * 30 * 12;
    $month = 60 * 60 * 24 * 30;
    $day = 60 * 60 * 24;
    $hour = 60 * 60;
    $min = 60;

    if ($time_dif < $hour) {
        $className = "blink_me";
    } else {
        $className = "";
    }
    switch ($type) {
        case 'date': ?>
            <time>
                <span id="postTime" time="<?php echo $time_int; ?>"></span>
            </time>
        <?php
            break;
        case 'recent':
        ?> <i>
                <time class="<?php echo $className; ?>">
                    <?php
                    if ($time_dif >= $year) {
                        $long = round($time_dif / $year);
                        echo $long . 'နှစ်';
                        //echo $long>1?'s':'';
                        echo 'ခန့်က';
                    } elseif ($time_dif >= $month) {
                        $long = round($time_dif / $month);
                        echo $long . 'လ';
                        //echo $long>1?'s':'';
                        echo 'ခန့်က';
                    } elseif ($time_dif >= $day) {
                        $long = round($time_dif / $day);
                        echo $long . 'ရက်';
                        //echo $long>1?'s':'';
                        echo 'ခန့်က';
                    } elseif ($time_dif >= $hour) {
                        $long = round($time_dif / $hour);
                        echo $long . 'နာရီကြာ';
                        //echo $long>1?'s':'';
                        echo 'ခန့်က';
                    } elseif ($time_dif >= $min) {
                        $long = round($time_dif / $min);
                        echo $long . 'မိနစ်';
                        //echo $long>1?'s':'';
                        echo 'ခန့်က';
                    } else {
                        echo 'ယခု';
                    }
                    ?>
                </time>
            </i>
<?php
            break;
        default:
            $time_dif > $day * 7 ? hein_time('date') : hein_time('recent');
            break;
    }
    // echo ' <i>'.date("d-m-Y (D)",strtotime($time)).'</i>';
}

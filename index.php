<?php
function timesAgo($createdAt) {
  date_default_timezone_set("Asia/dhaka");
  $today = new DateTime();
  $createdAt = new DateTime($createdAt);
  $timeDiff = $today->diff($createdAt);
  $ymdArr = array('year' => $timeDiff->y, 'month' => $timeDiff->m, 'day' => $timeDiff->d);
  $hisArr = array('hour' => $timeDiff->h, 'min' => $timeDiff->i, 'sec' => $timeDiff->s);

  if (!empty($ymdArr['year'])) {

    if ($ymdArr['year'] <= 1) {
        return $ymdArr['year'] . ' year ago';
      } else {
        return $ymdArr['year'] . ' years ago';
      }

  } elseif (!empty($ymdArr['month'])) {

    if ($ymdArr['month'] <= 1) {
        return $ymdArr['month'] . ' month ago';
      } else {
        return $ymdArr['month'] . ' months ago';
      }

  }elseif ($ymdArr['day'] > 0) {

    if ($ymdArr['day'] < 7) {
      if ($ymdArr['day'] <= 1) {
        return $ymdArr['day'] . ' day ago';
      } else {
        return $ymdArr['day'] . ' days ago';
      }
    } else {
      $week = floor(($timeDiff->d) / 7);
     if ($week <= 1) {
        return $week . ' week ago';
      } else {
        return $week . ' weeks ago';
      }
    }

  } else {
    if (!empty($hisArr['hour'])) {
      if ($hisArr['hour'] <= 1) {
        return $hisArr['hour'] . ' hour ago';
      } else {
        return $hisArr['hour'] . ' hours ago';
      }

    } elseif (!empty($hisArr['min'])) {
      if ($hisArr['min'] <= 1) {
        return $hisArr['min'] . ' min ago';
      } else {
        return $hisArr['min'] . ' mins ago';
      }
    } elseif (!empty($hisArr['sec'] < 60)) {
      return 'Just Now';
    }
  }
}

echo timesAgo('Dec 7, 2019, 10:18am');

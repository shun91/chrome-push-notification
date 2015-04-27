<?php
/*
 subscriptionIdとendpointを保存するAPIのサンプル．
 本来は主キーをsubscriptionIdとして，DBに保存した方がいい気がします．
 */

// subscriptionIdとendpointを保存するファイルのパス
define("FILE_NAME", "");

// subscriptionIdとendpointを登録．
function registSubscription($subscriptionId, $endpoint){
  // テキストファイルに追記．
  file_put_contents(FILE_NAME, $subscriptionId.','.$endpoint."\n", FILE_APPEND|LOCK_EX);
}

function main(){
  // 値がPOSTされていなければエラー吐いて終了．
  if (!$_POST) {
    echo 'error';
    return;
  }

  // subscriptionIdとendpointを登録．
  $subscriptionId = $_POST['subscription_id'];
  $endpoint = $_POST['endpoint'];
  registSubscription($subscriptionId, $endpoint);

  echo 'success';
}

main();
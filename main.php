<?php
/**
 * This project is ...
 * .....
 * .....
 *
 * PHP Version 7
 *
 * @category Class
 * @package  None
 * @author   tecokimura <tecokimura@gmail.com>
 * @license  MIT License
 * @link     https://github.com/tecokimura/ReadListToAttachedMail
 *
 * Created by PhpStorm.
 * User: kimura
 * Date: 2017/01/16
 * Time: 1:18
 */

require_once './vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


// 実行時のオプション設定
// define('ARGV_INDEX_PHP_FNAME', 0);
// define('ARGV_INDEX_CONF_FNAME', 1);



// 起動オプション確認、第一引数から設定ファイル名を取得する
// 設定ファイル：一行目：PDFパス。2行目：name,mailaddress
if (isset($argc) && isset($argv)) {
    main($argc, $argv);
    exit;
}


/**
 * プログラムのメイン処理
 * 設定ファイルから必要なファイルを添付してメールを送信する
 *
 * @param int      $argc 起動引数がいくつあるか
 * @param String[] $argv 起動引数の文字列
 *
 * @return void 戻り値なし
 */
function main($argc, $argv)
{
    try {


        // 起動オプションから設定を取り出す
        $aryOption = getPhpOption($argv);


        // $log = getLog($logLevel);

    } catch (Exception $mainExcep) {
        //
    }


    // ヘルプの出力が必要な場合
    if ( false ) {
        dispHelpThis();
    }

}




/**
 * PHP起動時のオプションを取得する
 * 起動引数が存在するか、またファイルが存在するかを確認する
 *
 * @param string[] $argv       起動時のオプション 第1引数 => ファイルパス(絶対パス もしくは 相対パス)
 * @param bool     $isRealPath 戻り値であるファイルパスを絶対パスにするフラグ デフォルトはfalse
 *
 * @return string    ファイルパスを返す ファイルがない時は空で返す
 * @throws Exception エラー発生時に呼び出し元の関数に例外を投げる
 */
function getPhpOption($argv, $isRealPath = false)
{
    $result = array();

    try {
        if (empty($argv) == false && count($argv) == ARGV_INDEX_MAX) {


        } else {
            throw new ArgvException();
        }
    } catch (Exception $e) {
        throw $e;
    }

    return $result;
}


/**
 * オリジナル標準出力
 *
 * @param string $str    出力する文字列
 * @param string $encode エンコード方法
 *
 * @return void 戻り値なし
 */
function println($str, $encode = OS_ENC)
{
    if (empty($encode)) {
        print $str . PHP_EOL;

    } else {
        print mb_convert_encoding($str, $encode, 'UTF-8') . PHP_EOL;
    }
}


/**
 * ファイルに出力するログ
 *
 * @param int $level ログの出力レベル
 *
 * @return Logger
 */
function getLog($level = Logger::INFO)
{
    $log = new Logger('LogINF');
    $handler = new StreamHandler('php://stdout', $level);
    $log->pushHandler($handler);

    return $log;
}


/**
 * このプログラムの使い方を表示する
 *
 * @param string $dispEnc 出力文字コード
 *
 * @return void 戻り値なし
 */
function dispHelpThis($dispEnc = "SJIS")
{
    $msg = <<<EOM
*****************************

How to use?

argv[n]
[0] = main.php

*****************************
EOM;


    // エンコードの指定がある場合
    // 一応日本語の説明文が入ってもいいように
    if (empty($dispEnc) == false) {
        $msg = mb_convert_encoding($msg, $dispEnc);
    }

    print $msg . PHP_EOL;

}


/**
 * Class ArgvException
 *
 * @category Exception_Class
 * @package  None
 * @author   tecokimura <tecokimura@gmail.com>
 * @license  MIT License
 * @link     https://github.com/tecokimura/ReadListToAttachedMail
 */
class ArgvException extends Exception
{
  
}

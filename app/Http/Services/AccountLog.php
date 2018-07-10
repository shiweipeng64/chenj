<?php
namespace App\Http\Services;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Processor\WebProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Formatter\LineFormatter;
use Config;

/**
 * UserLog
 *
 * Custom monolog logger for CMS user : DEBUG,INFO,NOTICE,WARNING,ERROR,CRITICAL,ALERT,EMERGENCY
 *
 * @author     
 */ 
class AccountLog {

    protected static $accountLog = "";

    /**
     * write 
     * @return void
     */
    public static function write($fileName, $logtext='', $level=Logger::INFO)
    {
        if(empty(self::$accountLog)){
            self::$accountLog = new Logger('account_log');
        }
        // handler init, making days separated logs
        $handler = new RotatingFileHandler(Config::get('app.account_log_path') . $fileName, 0, $level);
        // formatter, ordering log rows
        $handler->setFormatter(new LineFormatter("[%datetime%] %channel%.%level_name%: %message% %extra% %context%\n"));
        // add handler to the logger
        self::$accountLog->pushHandler($handler);
        // processor, adding URI, IP address etc. to the log
        self::$accountLog->pushProcessor(new WebProcessor);
        // processor, memory usage
        self::$accountLog->pushProcessor(new MemoryUsageProcessor);
        
        self::$accountLog->addInfo($logtext);
    }
}
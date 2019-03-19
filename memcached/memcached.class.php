<?php
/**
 * Memcached 存储 Session类
 */
class MemcacheSession {

    protected static $lifeTime     = 3600;
    protected static $handle       = null;

    public function start(Memcache $mem) {
        self::$handle = $mem;
        self::$lifeTime = ini_get('session.gc_maxlifetime');
        session_set_save_handler(
            array(__CLASS__, 'open'),
            array(__CLASS__, 'close'),
            array(__CLASS__, 'read'),
            array(__CLASS__, 'write'),
            array(__CLASS__, 'destroy'),
            array(__CLASS__, 'gc')
        );
        session_start();
    }

    /**
     * 打开Session 
     * @access private 
     * @param string $savePath 
     * @param mixed $sessName  
     */
    private static function open($savePath, $sessName) {
        return true;
    }

    /**
     * 关闭Session 
     * @access public 
     */
    public static function close() {
        self::gc(self::$lifeTime);
        self::$handle->close();
        self::$handle = null;
        return true;
    }

    /**
     * 读取Session 
     * 如果会话中有数据，read 回调函数必须返回将会话数据编码（序列化）后的字符串。 如果会话中没有数据，read   
     * 回调函数返回空字符串。

       所以，在read()方法的实现时，如果返回的数据库查询结果是数组的形式，要对其进行序列化操作；如果返回的数据查询为空则返回空字符串；
       博主就在read()方法的return $result; 改成return serialize($result);
     * @access private 
     * @param string $sessID 
     */
    private static function read($sessID) {
        // echo "read----{$sessID}";
        // self::write($sessID,'test');
        // return serialize(self::$handle->get($sessID));
        return self::$handle->get($sessID);
    }

    /**
     * 写入Session 
     * @access public 
     * @param string $sessID 
     * @param String $sessData  
     */
    public static function write($sessID, $sessData) {
        return self::$handle->set($sessID, $sessData, 0, self::$lifeTime);
    }

    /**
     * 删除Session 
     * @access private 
     * @param string $sessID 
     */
    private static function destroy($sessID) {
        return self::$handle->delete($sessID);
    }

    /**
     * Session 垃圾回收
     * @access private 
     * @param string $sessMaxLifeTime 
     */
    private static function gc($sessMaxLifeTime) {
        return true;
    }  
}
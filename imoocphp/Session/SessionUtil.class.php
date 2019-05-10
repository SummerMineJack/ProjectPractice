<?php

/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/9
 * Time: 14:54
 */
require_once '../../login/MysqlConntect.php';

/**
 * Class SessionUtil自定义session会话控制器
 */
class SessionUtil implements SessionHandlerInterface
{

    private $connect;
    private $lifeTime;

    /**
     * Close the session
     * @link https://php.net/manual/en/sessionhandlerinterface.close.php
     * @return bool <p>
     * The return value (usually TRUE on success, FALSE on failure).
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function close()
    {
        $this->connect->closeDBconnect();
        return true;
    }

    /**
     * Destroy a session
     * @link https://php.net/manual/en/sessionhandlerinterface.destroy.php
     * @param string $session_id The session ID being destroyed.
     * @return bool <p>
     * The return value (usually TRUE on success, FALSE on failure).
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function destroy($session_id)
    {
        $session_id = mysqli_escape_string($session_id);
        $sql = "delete from sessions where session_id='{$session_id}'";
        $result = $this->connect->sel4Sql($sql);
        return $result == 1;

    }

    /**
     * Cleanup old sessions
     * @link https://php.net/manual/en/sessionhandlerinterface.gc.php
     * @param int $maxlifetime <p>
     * Sessions that have not updated for
     * the last maxlifetime seconds will be removed.
     * </p>
     * @return bool <p>
     * The return value (usually TRUE on success, FALSE on failure).
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function gc($maxlifetime)
    {
        $sql = "delete from sessions where session_exprise<" . time();
        $result = $this->connect->sel4Sql($sql);
        if (mysqli_affected_rows($result) > 0) {
            return true;
        }
        return false;
    }

    /**
     * Initialize session
     * @link https://php.net/manual/en/sessionhandlerinterface.open.php
     * @param string $save_path The path where to store/retrieve the session.
     * @param string $name The session name.
     * @return bool <p>
     * The return value (usually TRUE on success, FALSE on failure).
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function open($save_path, $name)
    {
        $this->lifeTime = get_cfg_var('session.gc_maxlifetime');
        $this->connect = new mysqlConntect();
        $this->connect->conntct();
        if ($this->connect) {
            return true;
        }
        return false;
    }

    /**
     * Read session data
     * @link https://php.net/manual/en/sessionhandlerinterface.read.php
     * @param string $session_id The session id to read data for.
     * @return string <p>
     * Returns an encoded string of the read data.
     * If nothing was read, it must return an empty string.
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function read($session_id)
    {
        $sql = "select * from sessions where session_id='{$session_id}' and session_exprise>" . time();
        $result = $this->connect->sel4Sql($sql);
        if (mysqli_num_rows($result)) {
            return mysqli_fetch_assoc($result)['session_data'];
        }
        return '';
    }

    /**
     * Write session data
     * @link https://php.net/manual/en/sessionhandlerinterface.write.php
     * @param string $session_id The session id.
     * @param string $session_data <p>
     * The encoded session data. This data is the
     * result of the PHP internally encoding
     * the $_SESSION superglobal to a serialized
     * string and passing it as this parameter.
     * Please note sessions use an alternative serialization method.
     * </p>
     * @return bool <p>
     * The return value (usually TRUE on success, FALSE on failure).
     * Note this value is returned internally to PHP for processing.
     * </p>
     * @since 5.4.0
     */
    public function write($session_id, $session_data)
    {
        $newExp = time() + $this->lifeTime;
        //首先查询是否存在指定的sessionid，如果存在，就更新数据，否则就写入数据
        $sql = "select * from sessions where session_id='{$session_id}'";
        $result = $this->connect->sel4Sql($sql);
        if (mysqli_num_rows($result)) {
            $sql = "update sessions set session_exprise='{$newExp}', session_data='{$session_data}' where session_id='{$session_id}'";
        } else {
            $sql = "insert sessions values ('{$session_id}', '{$session_data}','{$newExp}')";
        }
        $result = $this->connect->sel4Sql($sql);
        return $result == 1;
    }
}
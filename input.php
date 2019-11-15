<?php

class inputcheck {

  /**
   * 验证留言人姓名是否敏感
   * @param type string
   * @return boolean
   */
  function postCheck($content) {
    $keywords = ['习近平', '胡锦涛', '江泽民', '邓小平', '毛泽东'];
    foreach ($keywords as $name) {
      if ($content == $name) {
        return false;
      }
    }
    return true;
  }

}

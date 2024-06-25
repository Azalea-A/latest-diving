<?php

//ヴィジット（サイドバー）を表示する
if (is_active_sidebar('sidebar')) {
  dynamic_sidebar('sidebar');
}

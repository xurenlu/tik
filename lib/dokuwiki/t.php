<?php

if(!defined('DOKU_INC')) define('DOKU_INC',dirname(__FILE__).'/');
require_once(DOKU_INC.'inc/init.php');
require_once(DOKU_INC.'inc/common.php');
require_once(DOKU_INC.'inc/events.php');
require_once(DOKU_INC.'inc/pageutils.php');
require_once(DOKU_INC.'inc/html.php');
require_once(DOKU_INC.'inc/auth.php');
require_once(DOKU_INC.'inc/actions.php');
require_once(DOKU_INC.'inc/parser/parser.php');
require_once(DOKU_INC.'inc/parserutils.php');
function doku_parser($text){
    return p_render("xhtml",p_get_instructions($text),$info);
}
$conf= array(
            'datadir'   => './writable/pages',
            'olddir'    => './writable/attic',
            'mediadir'  => './writable/media',
            'metadir'   => './writable/meta',
            'cachedir'  => './writable/cache/',
            'indexdir'  => './writable/index',
            'lockdir'   => './writable/locks',
            'tmpdir'    => './wrtiable/tmp');

print doku_parser("
{{hi.gif}}
<code php>
<?php
echo \"hello world\";
?>
    </code>
    ");

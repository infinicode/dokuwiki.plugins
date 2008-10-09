<?php
/**
 * Plugin Insert Icon: Inserts little icons
 * 
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Adolfo González Blázquez <code@infinicode.org>
 */
 
// must be run within Dokuwiki
if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');

// Plugin path
define('PLUGIN_DIR',DOKU_BASE.'lib/plugins/inserticon/');
 
/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_inserticon extends DokuWiki_Syntax_Plugin {
 
	function getInfo(){
		return array(
			'author' => 'Adolfo González Blázquez',
			'email'  => 'code@infinicode.org',
			'date'   => '2008-10-09',
			'name'   => 'Insert Icon Plugin',
			'desc'   => 'Inserts little icons',
			'url'    => 'http://www.infinicode.org/code/dw/',
		);
    }
 
    function getType() { return 'substition'; }
    function getSort() { return 138; }
    
    function connectTo($mode) {
		$this->Lexer->addSpecialPattern('\{soundicon\}',$mode,'plugin_inserticon');
		$this->Lexer->addSpecialPattern('\{videoicon\}',$mode,'plugin_inserticon');
		$this->Lexer->addSpecialPattern('\{foldericon\}',$mode,'plugin_inserticon');
		$this->Lexer->addSpecialPattern('\{zipicon\}',$mode,'plugin_inserticon');
		$this->Lexer->addSpecialPattern('\{imageicon\}',$mode,'plugin_inserticon');
		$this->Lexer->addSpecialPattern('\{peopleicon\}',$mode,'plugin_inserticon');
    }
    
    function handle($match, $state, $pos, &$handler) {  
    	return array($match, $state, $pos);
    }
    
    function render($mode, &$renderer, $data) {
 		
		if ($mode == 'xhtml') {
			if ($data[0] == '{soundicon}') {
				$renderer->doc .= '<img src="'.PLUGIN_DIR.'/images/sound.png" alt="MP3" title="Sound" align="top" />';
				return true;
			}
			else if ($data[0] == '{videoicon}') {
				$renderer->doc .= '<img src="'.PLUGIN_DIR.'/images/video.png" alt="Video" title="Video" align="top" />';
				return true;
			}
			else if ($data[0] == '{foldericon}') {
				$renderer->doc .= '<img src="'.PLUGIN_DIR.'/images/folder.png" alt="Carpeta" title="Folder" align="top" />';
				return true;
			}
			else if ($data[0] == '{zipicon}') {
				$renderer->doc .= '<img src="'.PLUGIN_DIR.'/images/zip.png" alt="ZIP" title="ZIP" align="top" />';
				return true;
			}
			else if ($data[0] == '{imageicon}') {
                $renderer->doc .= '<img src="'.PLUGIN_DIR.'/images/image.png" alt="Image" title="Image" align="top" />';
                return true;
            }
            else if ($data[0] == '{peopleicon}') {
                $renderer->doc .= '<img src="'.PLUGIN_DIR.'/images/people.png" alt="People" title="People" align="top" />';
                return true;
            }
		}
			return false;
		}
	}
?>

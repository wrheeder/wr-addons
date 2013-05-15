<?php

namespace jsTree;

class jsTree extends \View {

    function init() {
        parent::init();
        //$this->js(true)->_selector('body')->layout()->show('west');
        $this->loadIncludes();
    }

    function setModel($m) {
        parent::setModel($m);
        $l = $this->api->add('listers/Lister_Tree', null, 'tree');
        $l->setModel($m);
        $l->setRelationFields('id', 'parent_id');
        $l->js(true)->univ()->jstreePlugin();
    }

//dont use ID with set static source
    function setSource($src,$field,$other_field,$opts=null) {
        $l = $this->api->add('listers/Lister_Tree', null, 'tree');
        $l->setSource($src);
        $l->setRelationFields('ids', 'parent_id');
        $l->js(true)->univ()->jstreePlugin($src,$l,$other_field,$opts);
    }

    function loadIncludes() {
        $l = $this->api->locate('addons', 'jsTree', 'location');
        $this->api->pathfinder->addLocation($this->api->locate('addons', 'jsTree'), array(
            'js' => 'js'
        ))->setParent($l);

        $this->api->jui->addStaticStylesheet('themes/default/style', '.css', 'js');
        $this->js(true)->_load('jstreePlugin');
        $this->api->jui->addStaticInclude('jquery.hotkeys');
        $this->api->jui->addStaticInclude('jquery.jstree');
        //$this->setElement('demo1');
    }

}

// public $options = array(
//        'applyDefaultStyles' => true,
//        'plugins'=>array("themes","json_data","ui","crrm","cookies","dnd","search","types","hotkeys","contextmenu"),
//        'contextmenu'=>array(),
//        'core'=>array('initially_open'=>'phtml_1')
//    );
//
//    function init() {
//        parent::init();
//
//        $this->loadIncludes();
//        $this->js(true)->_selector('body')->layout()->show('west');   ///////////This needs to be removed and Layout plugin shouid be refined
//        $l = $this->api->add('listers/Lister_Tree',null,'tree');
//        // $l = $this->add('listers/Lister_Tree'); // DON'T USE FIELD NAMED "ID", because it's already built-in Model class as auto-incremental
//        $l->setSource(array(
//            array('ids' => 0, 'name' => 'Western Cape','rel'=>'region', 'parent_id' => null),
//            array('ids' => 1, 'name' => 'NSB','rel'=>'project', 'parent_id' => 0),
//            array('ids' => 2, 'name' => '5257','rel'=>'site', 'parent_id' => 1),
//            array('ids' => 3, 'name' => '5258','rel'=>'site', 'parent_id' => 1),
//            array('ids' => 4, 'name' => '8423','rel'=>'site', 'parent_id' => 1),
//            array('ids' => 5, 'name' => '4782','rel'=>'site', 'parent_id' => 1)
//        ));
//        $l->setRelationFields('ids', 'parent_id');
//        $options = array(
//            'applyDefaultStyles' => true,
//            'plugins' => array('themes', 'html_data', 'checkbox', 'ui', 'types'),
//            'contextmenu' => array('Copy'),
//            'core' => array('initially_open' => 'phtml_1'),
//            'themes' => array(
//                'theme' => 'default',
//                'dots' => false,
//                'icons' => false),
//            'types' => array(
//                'types' => array(
//                    'max_children' => -1,
//                    'max_depth' => -1,
//                    'default' => array(
//                        'valid_children' => 'default',
//                        'select_node' => 'function (e) {
//                this.toggle_node(e);
//                return false;
//            }')
//                )
//            )
//        );
//
//        $l->js(true)->_selector('#eclipse_listers_lister_tree')->jstreePlugin();
//
//        
//    }
//
//    function loadIncludes() {
//        $l = $this->api->locate('addons', 'jsTree', 'location');
//        $this->api->pathfinder->addLocation($this->api->locate('addons', 'jsTree'), array(
//            'js' => 'js'
//        ))->setParent($l);
//
//        $this->api->jui->addStaticStylesheet('themes/default/style', '.css', 'js');
//        $this->js(true)->_load('jstreePlugin');
//        $this->api->jui->addStaticInclude('jquery.hotkeys');
//        $this->api->jui->addStaticInclude('jquery.jstree');
//        //$this->setElement('demo1');
//    }
//    function render() {
//        parent::render();
//    }
<?php

namespace Layout;

class Layout extends \View {

    public $options = array(
        //'applyDefaultStyles' => true,
        'north'=>array('closable'=>false,'resizable'=>false,'slidable'=>false,'spacing_open'=>3,'size'=>'95'),
        'south'=>array('closable'=>false,'resizable'=>false,'slidable'=>false,'spacing_open'=>3,'size'=>'50','togglerClass'=>"myToggler"),
        'west'=>array('initClosed'=>true,'spacing_open'=>3,'spacing_closed'=>6,'size'=>'210')
    );

    function init() {
        parent::init();

        $this->loadIncludes();
    }

    function loadIncludes() {
        $l = $this->api->locate('addons', 'Layout', 'location');
        $this->api->pathfinder->addLocation($this->api->locate('addons', 'layout'), array(
            'js' => 'js'
        ))->setParent($l);

        $this->api->jui->addStaticStylesheet('layout/layout-default-latest', '.css', 'js');
        $this->api->jui->addStaticInclude('layout/jquery.layout-latest');
        $this->setElement('body');
    }
    function toggle($pane){
        $this->js(true)->_selector('body')->layout($this->options)->toggle($pane);
    }
    function show($pane){
        $this->js(true)->_selector('body')->layout($this->options)->show($pane);
    }
    function hide($pane){
        $this->js(true)->_selector('body')->layout($this->options)->hide($pane);
    }
    function render() {
        $this->js(true)->_selector('body')->layout($this->options);
        parent::render();
    }

}